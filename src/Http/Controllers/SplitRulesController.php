<?php

namespace Octo\Payment\Http\Controllers;

use App\Http\Controllers\Controller;
use Octo\Payment\Models\Company;
use Octo\Payment\Models\SplitRule;

class SplitRulesController extends Controller
{
    public function index(Company $company)
    {
        $company->splitRules;
        return view('payment::split_rules/index', compact('company'));
    }

    public function create(Company $company)
    {
        $splitRule = new SplitRule();
        $company->recipients;
        return view('payment::split_rules/create', compact('splitRule', 'company'));
    }

    public function store(Company $company)
    {
        $data = $this->validateData();
        $splitRule = new SplitRule;
        $splitRule->fill([
            'company_id' => $data['company_id'],
            'name' => $data['name'],
            'description' => $data['description'],
        ]);
        $splitRule->save();
        foreach ($data['recipients'] as $key => $recipient_id) {
            $firstRecipient = [];
            if ($key === 0) {
                $firstRecipient = [
                    'charge_processing_fee' => true,
                    'liable' => true,
                    'charge_remainder' => true,
                ];
            }
            $splitRule->recipients()->attach([$recipient_id => ['percentage' => $data['percentage'][$key]] + $firstRecipient]);
        }
        if (is_null($company->main_split_rule_setup)) {
            $company->main_split_rule_setup = $splitRule->id;
            $company->save();
        }
        return redirect()->route('company.split-rules.index', $company->id);
    }

    public function show(Company $company, SplitRule $splitRule)
    {
        $splitRule->recipients;
        return view('payment::split_rules/show', compact('company', 'splitRule'));
    }

    public function destroy(Company $company, SplitRule $splitRule)
    {
        $splitRule->delete();
        return redirect()->route('company.split-rules.index', $company->id);
    }

    protected function validateData()
    {
        return request()->validate([
            'company_id' => 'required|exists:' . config('payment.table_names.table_prefix', null) . 'companies,id',
            'name' => 'required',
            'description' => 'required',
            'recipients.*' => 'required|distinct|exists:' . config('payment.table_names.table_prefix', null) . 'recipients,id',
            'percentage.*' => ['required', 'integer', function ($attribute, $value, $fail) {
                if (array_sum(request()->percentage) != 100) {
                    $fail('A soma das porcentagens precisa somar 100');
                }
            },]
        ]);
    }
}
