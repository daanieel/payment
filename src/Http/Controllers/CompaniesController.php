<?php

namespace Octo\Payment\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Octo\Payment\Models\Billing;
use Octo\Payment\Models\Company;
use Octo\Payment\PagarMeRepository;

class CompaniesController extends Controller
{
    protected $pagarme;

    public function __construct()
    {
        $this->pagarme = PagarMeRepository::pagarMeOptions();
    }

    public function index()
    {
        $companies = Company::all();
        return view('payment::companies/index', compact('companies'));
    }

    public function create()
    {
        $company = new Company();
        return view('payment::companies/create', compact('company'));
    }

    public function store()
    {
        $company = new Company;
        $company->fill($this->validateData());
        $company->save();
        return redirect()->route('companies.show', $company->id);
    }

    public function show(Company $company)
    {
        $company->mainPaymentSetup;
        $company->mainSplitRuleSetup;
        return view('payment::companies/show', compact('company'));
    }

    public function edit(Company $company)
    {
        return view('payment::companies/edit', compact('company'));
    }

    public function update(Company $company)
    {
        $company->fill($this->validateData($company->id));
        $company->save();
        return redirect()->route('companies.show', $company->id);
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index');
    }

    protected function validateData($id = null)
    {
        return request()->validate([
            'legal_name' => 'required|max:255|min:5',
            'name' => 'required|max:255|min:5',
            'cnpj' => 'required|max:255|min:5|unique:' . config('payment.table_names.table_prefix', null) . 'companies,cnpj,' . $id,
            'phone' => 'required|max:255|min:5',
            'site' => 'required|max:255|min:5',
            'main_payment_setup' => 'nullable|exists:' . config('payment.table_names.table_prefix', null) . 'payment_configs,id',
            'main_split_rule_setup' => 'nullable|exists:' . config('payment.table_names.table_prefix', null) . 'split_rules,id',
        ]);
    }

}
