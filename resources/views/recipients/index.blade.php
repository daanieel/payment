@extends('payment::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Recipients</b></div>
                    <div class="panel-body">
                        @include('payment::layouts.message_session')
                        @if($company->recipients->isEmpty())
                            <div class="alert alert-danger">
                                <strong>Atenção!</strong>
                                Não foi encontarda nenhuma 'Recipients'! <a href="{{ route('company.recipients.create', $company->id) }}">Criar uma 'Recipient'</a>
                            </div>
                        @else
                            <table class="table table-bordered">
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>Ação</th>
                                </tr>
                                @foreach ($company->recipients as $recipient)
                                    <tr>
                                        <td class="td-center"><b>{{ $recipient->id }}</b></td>
                                        <td>{{ $recipient->name }}</td>
                                        <td>{{ $recipient->description }}</td>
                                        <td class="td-center">
                                            <form action="{{ route('company.recipients.destroy', [$company->id, $recipient->id]) }}" method="POST">
                                                <a class="btn btn-info btn-xs"
                                                   href="{{ route('company.recipients.show', [$company->id, $recipient->id]) }}">Show</a>
{{--                                                <a class="btn btn-primary btn-xs"--}}
{{--                                                   href="{{ route('company.recipients.edit', [$company->id, $recipient->id]) }}">Editar</a>--}}
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
