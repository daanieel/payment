<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link href="{{ asset('vendor/payment/css/app.css') }}" rel="stylesheet">

        @yield('css')

    </head>
    <body>
    <div id="app">
        @include('payment::layouts.navbar')
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('vendor/payment/js/app.js') }}"></script>

    <!-- jQuery mask -->
    <script src="{{ asset('vendor/payment/js/jquery-3.2.1.min.js') }}"></script>

    @yield('js')
    </body>
</html>
