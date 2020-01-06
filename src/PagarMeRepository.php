<?php

namespace Octo\Payment;

use PagarMe;

class PagarMeRepository
{
    public static function pagarMeOptions()
    {
        $pagarMeKey = (config('payment.pagarme.env') == 'live') ? config('payment.pagarme.api_key_live') : config('payment.pagarme.api_key_test');
        return new PagarMe\Client($pagarMeKey);
    }
}
