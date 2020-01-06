@extends('payment::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Split rules</b></div>
                    <div class="panel-body">
                        @if($company->splitRules->isEmpty())
                            <div class="alert alert-danger">
                                <strong>Atenção!</strong>
                                Não foi encontarda nenhuma 'Split rule'!
                                <a href="{{ route('company.split-rules.create', $company->id) }}">Criar uma 'Split rule'</a>
                            </div>
                        @else
                            <table class="table table-bordered">
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>Ação</th>
                                </tr>
                                @foreach ($company->splitRules as $splitRule)
                                    <tr>
                                        <td class="td-center"><b>{{ $splitRule->id }}</b></td>
                                        <td>{{ $splitRule->name }}</td>
                                        <td>{{ $splitRule->description }}</td>
                                        <td class="td-center">
                                            <form action="{{ route('company.split-rules.destroy', [$company->id, $splitRule->id]) }}" method="POST">
                                                <a class="btn btn-info btn-xs"
                                                   href="{{ route('company.split-rules.show', [$company->id, $splitRule->id]) }}">Show</a>
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger btn-xs">Delete</button>
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
