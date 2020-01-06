<?php

namespace Octo\Payment\Http\Controllers;

use App\Http\Controllers\Controller;
use Octo\Payment\Models\BankAccount;
use Octo\Payment\Models\Company;
use Octo\Payment\PagarMeRepository;
use PagarMe\Exceptions\PagarMeException;

class BankAccountsController extends Controller
{
    protected $pagarme;

    public function __construct()
    {
        $this->pagarme = PagarMeRepository::pagarMeOptions();
    }

    public function index(Company $company)
    {
        $company->bankAccounts;
        return view('payment::bank_accounts/index', compact('company'));
    }

    public function create(Company $company)
    {
        $bankAccount = new BankAccount();
        return view('payment::bank_accounts/create', compact('bankAccount', 'company'));
    }

    public function store(Company $company)
    {
        $bankAccount = new BankAccount;
        $bankAccount->fill($this->validateData());

        try {
            $bankAccountPagarMe = $this->pagarme->bankAccounts()->create([
                'bank_code' => $bankAccount->bank_code,
                'agencia' => $bankAccount->office_number,
                'conta' => $bankAccount->account_number,
                'conta_dv' => $bankAccount->account_digit,
                'document_number' => $bankAccount->document_number,
                'legal_name' => $bankAccount->legal_name,
                'type' => $bankAccount->type
            ]);
            $bankAccount->gateway_id = $bankAccountPagarMe->id;
        } catch (PagarMeException $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }

        $bankAccount->save();

        return redirect()->route('company.bank-accounts.show', [$company->id, $bankAccount->id]);
    }

    public function show(Company $company, BankAccount $bankAccount)
    {
        return view('payment::bank_accounts/show', compact('company', 'bankAccount'));
    }

    public function edit(Company $company, BankAccount $bankAccount)
    {
        return view('payment::bank_accounts/edit', compact('company', 'bankAccount'));
    }

    public function update(Company $company, BankAccount $bankAccount)
    {
        $bankAccount->fill($this->validateData());
        $bankAccount->save();
        return redirect()->route('company.bank-accounts.show', [$company->id, $bankAccount->id]);
    }

    public function destroy(Company $company, BankAccount $bankAccount)
    {
        $bankAccount->delete();
        return redirect()->route('company.bank-accounts.index', $company->id);
    }

    protected function validateData()
    {
        return request()->validate([
            'company_id' => 'required|exists:' . config('payment.table_names.table_prefix', null) . 'companies,id',
            'bank_code' => 'required|min:3|max:3',
            'office_number' => 'required|min:3|max:5',
            'account_number' => 'required|min:3|max:10',
            'account_digit' => 'required|min:1|max:1',
            'document_number' => 'required|min:11|max:14',
            'legal_name' => 'required|min:3|max:150',
            'office_digit' => 'max:2',
            'type' => 'required'
        ]);
    }
}
