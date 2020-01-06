<?php

namespace Octo\Payment\Http\Controllers;

use App\Http\Controllers\Controller;
use Octo\Payment\Models\BankAccount;
use Octo\Payment\Models\Recipient;
use Octo\Payment\Models\Company;
use Octo\Payment\PagarMeRepository;
use PagarMe\Exceptions\PagarMeException;

class RecipientsController extends Controller
{
    protected $pagarme;

    public function __construct()
    {
        $this->pagarme = PagarMeRepository::pagarMeOptions();
    }

    public function index(Company $company)
    {
        $company->recipients;
        return view('payment::recipients/index', compact('company'));
    }

    public function create(Company $company)
    {
        $recipient = new Recipient;
        $company->bankAccounts;
        return view('payment::recipients/create', compact('recipient', 'company'));
    }

    public function store(Company $company)
    {
        $recipient = new Recipient;
        $recipient->fill($this->validateData());

        try {
            $bankAccount = BankAccount::find(request()->bank_account_id);
            $recipientPagarme = $this->pagarme->recipients()->create([
                'bank_account_id' => $bankAccount->gateway_id,
                'transfer_day' => $recipient->transfer_day,
                'transfer_enabled' => $recipient->transfer_enabled,
                'transfer_interval' => $recipient->transfer_interval
            ]);
            $recipient->gateway_id = $recipientPagarme->id;
        } catch (PagarMeException $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }

        $recipient->save();
        $recipient->companies()->attach($company->id);
        return redirect()->route('company.recipients.index', $company->id);
    }

    public function show(Company $company, Recipient $recipient)
    {
        return view('payment::recipients/show', compact('company', 'recipient'));
    }

    public function edit(Company $company, Recipient $recipient)
    {
        $bankAccounts = $company->bankAccounts;
        return view('payment::recipients/edit', compact('company', 'recipient', 'bankAccounts'));
    }

    public function update(Company $company, Recipient $recipient)
    {
        $recipient->fill($this->validateData());
        $recipient->save();
        return redirect()->route('company.recipients.index', $company->id);
    }

    public function destroy(Company $company, Recipient $recipient)
    {
        $recipient->delete();
        return redirect()->route('company.recipients.index', $company->id);
    }

    protected function validateData()
    {
        $request = request();
        $data['automatic_anticipation_enabled'] = false;
        $rules = [];
        if ($request->transfer_enabled) {
            $data['transfer_enabled'] = true;
            $rules['transfer_interval'] = 'required|in:daily,weekly,monthly';
            switch ($request->transfer_interval) {
                case 'weekly':
                    $rules['transfer_day'] = 'required|integer|min:1|max:5';
                    break;
                case 'monthly':
                    $rules['transfer_day'] = 'required|integer|min:1|max:31';
                    break;
            }
        } else {
            $data['transfer_enabled'] = false;
        }
        $data = $data + request()->validate($rules + [
                    'name' => 'required|min:3|max:255',
                    'description' => 'required',
                    'bank_account_id' => 'required|exists:' . config('payment.table_names.table_prefix', null) . 'bank_accounts,id',
                ]);
        return $data;
    }
}
