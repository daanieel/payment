@extends('payment::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Edit bank account</b></div>
                    <div class="panel-body">
                        @include('payment::layouts.message_session')
                        <p>
                            Você está editando uma bank account, fique atento com os dados aqui inseridos!
                        </p>
                        @include('payment::layouts.form.error')
                        <form action="{{route('company.bank-accounts.update', [$company->id, $bankAccount->id])}}" method="POST">
                            @method('PUT')
                            @include('payment::bank_accounts.form')
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button id="register" type="submit" class="btn btn-primary">Editar bank account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
