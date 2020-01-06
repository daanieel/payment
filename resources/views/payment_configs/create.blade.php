@extends('payment::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Criar um Payment config</b></div>

                    <div class="panel-body">

                        @include('payment::layouts.message_session')

                        <div>
                            <p>
                                Você está criando uma Payment config nova, fique atento com os dados aqui inseridos!
                            </p>
                        </div>

                        @include('payment::layouts.form.error')

                        <form action="{{route('company.payment-configs.store', $company->id)}}" method="POST">

                            @include('payment::payment_configs.form')

                            <div class="col-md-12 text-center">
                                <button id="register" type="submit" class="btn btn-primary">Criar Payment config</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('vendor/payment/js/jquery.mask.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.money').mask("#.##0.00", {reverse: true});
            $('.percent').mask('#0.00', {reverse: true});
            $(document).on("change", "#late_payment_type", function () {
                $('.late_payment').hide();
                $('#late_payment_' + this.value).show();
            });
        });
    </script>
@endsection
