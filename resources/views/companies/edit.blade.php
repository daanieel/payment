@extends('payment::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Edit company</b></div>
                    <div class="panel-body">
                        @include('payment::layouts.message_session')
                        <p>
                            Você está editando uma empresa, fique atento com os dados aqui inseridos!
                        </p>
                        @include('payment::layouts.form.error')
                        <form action="{{route('companies.update', $company->id)}}" method="POST">
                            @method('PUT')
                            @include('payment::companies.form')
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button id="register" type="submit" class="btn btn-primary">Editar empresa</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
