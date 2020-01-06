@extends('payment::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Companies</b></div>
                    <div class="panel-body">
                        @include('payment::layouts.message_session')
                        @if($companies->isEmpty())
                            <div class="alert alert-danger">
                                <strong>Atenção!</strong>
                                Não foi encontarda nenhuma 'Company'! <a href="{{ route('companies.create') }}">Criar uma 'Company'</a>
                            </div>
                        @else
                            <table class="table table-bordered">
                                <tr>
                                    <th>ID</th>
                                    <th>Razão social</th>
                                    <th>CNPJ</th>
                                    <th>Crud action</th>
                                </tr>
                                @foreach ($companies as $company)
                                    <tr>
                                        <td class="td-center"><b>{{ $company->id }}</b></td>
                                        <td>{{ $company->legal_name }}</td>
                                        <td>{{ $company->cnpj }}</td>
                                        <td class="td-center">

                                            <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
                                                <a class="btn btn-info btn-xs" href="{{ route('companies.show', $company->id) }}">Show</a>
                                                <a class="btn btn-primary btn-xs" href="{{ route('companies.edit', $company->id) }}">Editar</a>
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
