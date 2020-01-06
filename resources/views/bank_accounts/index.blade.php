@extends('payment::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Bank Accounts</b></div>
                    <div class="panel-body">
                        @include('payment::layouts.message_session')
                        @if($company->bankAccounts->isEmpty())
                            <div class="alert alert-danger">
                                <strong>Atenção!</strong>
                                Não foi encontarda nenhuma 'BankAccount'! <a href="{{ route('company.bank-accounts.create', $company->id) }}">Criar uma 'BankAccount'</a>
                            </div>
                        @else
                            <table class="table table-bordered">
                                <tr>
                                    <th>ID</th>
                                    <th>Código do banco</th>
                                    <th>Conta</th>
                                    <th>Nome</th>
                                    <th>Ação</th>
                                </tr>
                                @foreach ($company->bankAccounts as $bankAccount)
                                    <tr>
                                        <td class="td-center"><b>{{ $bankAccount->id }}</b></td>
                                        <td>{{ $bankAccount->office_number }}</td>
                                        <td>{{ $bankAccount->account_number }}</td>
                                        <td>{{ $bankAccount->legal_name }}</td>
                                        <td class="td-center">
                                            <form action="{{ route('company.bank-accounts.destroy', [$company->id, $bankAccount->id]) }}" method="POST">
                                                <a class="btn btn-info btn-xs"
                                                   href="{{ route('company.bank-accounts.show', [$company->id, $bankAccount->id]) }}">Show</a>
{{--                                                <a class="btn btn-primary btn-xs"--}}
{{--                                                   href="{{ route('company.bank-accounts.edit', [$company->id, $bankAccount->id]) }}">Editar</a>--}}
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-primary btn-xs">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
