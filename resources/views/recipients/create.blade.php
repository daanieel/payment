@extends('payment::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Criar um Recipient</b></div>
                    <div class="panel-body">
                        @include('payment::layouts.message_session')
                        <p>
                            Você está criando uma Bank Account nova, fique atento com os dados aqui inseridos!
                        </p>
                        @include('payment::layouts.form.error')
                        <form action="{{route('company.recipients.store', $company->id)}}" method="POST">
                            @include('payment::recipients.form')
                            <div class="col-md-12 text-center">
                                <button id="register" type="submit" class="btn btn-primary">Criar Recipient</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


