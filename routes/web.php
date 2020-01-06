<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->group(function () {
    Route::resources([
        'companies' => 'CompaniesController',
        'company.bank-accounts' => 'BankAccountsController',
        'company.recipients' => 'RecipientsController',
    ]);
    Route::resource('company.split-rules', 'SplitRulesController')
        ->except(['edit', 'update']);
    Route::resource('company.payment-configs', 'PaymentConfigsController')
        ->except(['edit', 'update']);
});
