@extends('payment::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Company</b></div>
                    <div class="panel-body">
                        <h3 style="margin-left: 11px;">Tutorial - Configuração</h3>
                        <div class="list-group">
                            <div class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h4 class="mb-1">
                                        Payment Config
                                        @if($company->main_payment_setup)
                                            <a href="{{route('company.payment-configs.show', [$company->id, $company->main_payment_setup])}}">
                                                <span class="badge" style="background-color: #28a745;">Configurado</span>
                                            </a>
                                        @else
                                            <span class="badge">Não configurado</span>
                                        @endif
                                    </h4>
                                </div>
                                <p class="mb-1">
                                    Toda 'Company' precisa ter configurado uma 'Payment Config' padrão.
                                </p>
                                <hr>
                                <a href="{{route('company.payment-configs.create', $company->id)}}" class="btn btn-primary btn-sm">
                                    Criar um 'Payment Config'</a>
                                <a href="{{route('company.payment-configs.index', $company->id)}}" class="btn btn-secondary btn-sm">
                                    Ver todos os 'Payment Configs'</a>
                            </div>

                            <div class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h4 class="mb-1">
                                        Split rule
                                        @if($company->main_split_rule_setup)
                                            <a href="{{route('company.split-rules.show', [$company->id, $company->main_split_rule_setup])}}">
                                                <span class="badge" style="background-color: #28a745;">Configurado</span>
                                            </a>
                                        @else
                                            <span class="badge">Não configurado</span>
                                        @endif
                                    </h4>
                                </div>
                                <p class="mb-1">
                                    Toda 'Company' precisa ter configurado uma 'Split Rule' padrão.<br>
                                    A 'Split Rule' precisa ser de acordo com sua regra de negócio, você pode cadasrtar até
                                    10 'Recipients' com valores diferentes. Para criar uma Split Rule você vai precisar:<br>
                                    <ul>
                                        <li>
                                            Primeiro passo é cadastrar <b>'BankAccount'</b>, para conseguir criar um 'Recipient'.<br>
                                            <a href="{{route('company.bank-accounts.create', $company->id)}}" class="btn btn-primary btn-sm">
                                                Criar uma 'Bank Account'</a>
                                            <a href="{{route('company.bank-accounts.index', $company->id)}}" class="btn btn-secondary btn-sm">
                                                Ver todas as 'Bank Accounts'</a>
                                        </li>
                                        <li>
                                            Segundo passo é cadastrar <b>'Recipient'</b>, para conseguir criar a 'Split Rule'.<br>
                                            <a href="{{route('company.recipients.create', $company->id)}}" class="btn btn-primary btn-sm">
                                                Criar um 'Recipient'</a>
                                            <a href="{{route('company.recipients.index', $company->id)}}" class="btn btn-secondary btn-sm">
                                                Ver todos os 'Recipient'</a>
                                        </li>
                                    </ul>
                                </p>
                                <hr>
                                <a href="{{route('company.split-rules.create', $company->id)}}" class="btn btn-primary btn-sm">
                                    Criar um 'Split Rule'</a>
                                <a href="{{route('company.split-rules.index', $company->id)}}" class="btn btn-secondary btn-sm">
                                    Ver todos os 'Split Rule'</a>
                            </div>

                        </div>
                        <pre>{{print_r($company->toArray())}}</pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
