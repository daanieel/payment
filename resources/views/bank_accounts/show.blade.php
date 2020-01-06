@extends('payment::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Bank Account</b></div>
                    <div class="panel-body">
                        <pre>
                            {{print_r($bankAccount->toArray())}}
                        </pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
