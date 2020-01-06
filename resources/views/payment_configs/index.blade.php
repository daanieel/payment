@extends('payment::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Payment configs</b></div>
                    <div class="panel-body">
                        @include('payment::layouts.message_session')
                        @if($company->paymentConfigs->isEmpty())
                            <div class="alert alert-danger">
                                <strong>Atenção!</strong>
                                Não foi encontarda nenhuma 'Payment Config'! <a href="{{ route('company.payment-configs.create', $company->id) }}">Criar uma 'Payment Config'</a>
                            </div>
                        @else
                            <table class="table table-bordered">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Descripition</th>
                                    <th>Ação</th>
                                </tr>
                                @foreach ($company->paymentConfigs as $paymentConfig)
                                    <tr>
                                        <td class="td-center"><b>{{ $paymentConfig->id }}</b></td>
                                        <td>{{ $paymentConfig->name }}</td>
                                        <td>{{ $paymentConfig->description }}</td>
                                        <td class="td-center">
                                            <form action="{{ route('company.payment-configs.destroy', [$company->id, $paymentConfig->id]) }}" method="POST">
                                                <a class="btn btn-info btn-xs"
                                                   href="{{ route('company.payment-configs.show', [$company->id, $paymentConfig->id]) }}">Show</a>
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
