@extends('payment::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Criar um Bank Account</b></div>

                    <div class="panel-body">

                        @include('payment::layouts.message_session')

                        <div>
                            <p>
                                Você está criando uma Bank Account nova, fique atento com os dados aqui inseridos!
                            </p>
                        </div>

                        @include('payment::layouts.form.error')

                        <form action="{{route('company.bank-accounts.store', $company->id)}}" method="POST">

                            @include('payment::bank_accounts.form')

                            <div class="col-md-12 text-center">
                                <button id="register" type="submit" class="btn btn-primary">Criar Bank Account</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


