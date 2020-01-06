<?php

namespace Octo\Payment\Http\Controllers;

use App\Http\Controllers\Controller;
use Octo\Payment\Models\Company;
use Octo\Payment\Models\PaymentConfig;

class PaymentConfigsController extends Controller
{
    public function index(Company $company)
    {
        $company->paymentConfigs;
        return view('payment::payment_configs/index', compact('company'));
    }

    public function create(Company $company)
    {
        $paymentConfig = new PaymentConfig;
        return view('payment::payment_configs/create', compact('company', 'paymentConfig'));
    }

    public function store(Company $company)
    {
        $paymentConfig = new PaymentConfig;
        $paymentConfig->fill($this->validateData());
        $paymentConfig->save();
        if (is_null($company->main_payment_setup)) {
            $company->main_payment_setup = $paymentConfig->id;
            $company->save();
        }
        return redirect()->route('company.payment-configs.index', $company->id);
    }

    public function show(Company $company, PaymentConfig $paymentConfig)
    {
        return view('payment::payment_configs/show', compact('company', 'paymentConfig'));
    }

    public function destroy(Company $company, PaymentConfig $paymentConfig)
    {
        $paymentConfig->delete();
        return redirect()->route('company.payment-configs.index', $company->id);
    }

    protected function validateData()
    {
        return request()->validate([
            'company_id' => 'required|exists:' . config('payment.table_names.table_prefix', null) . 'companies,id',
            'name' => 'required',
            'description' => 'required',
            'late_payment_type' => 'required|in:amount,percent',
            'late_payment_amount' => (request()->late_payment_type == 'amount' ? 'required|numeric' : 'nullable'),
            'late_payment_percent' => (request()->late_payment_type == 'percent' ? 'required|numeric' : 'nullable'),
            'late_payment_daily_interest' => 'required|numeric',
        ]);
    }
}
