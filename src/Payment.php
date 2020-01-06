<?php

namespace Octo\Payment;

use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money;
use NumberFormatter;

class Payment
{
    /**
     * Format the given amount into a displayable currency.
     *
     * @param  int  $amount
     * @param  string|null  $currency
     * @return string
     */
    public static function formatAmount($amount, $currency = null)
    {
        $money = new Money($amount, new Currency(strtoupper($currency ?? config('payment.currency'))));

        $numberFormatter = new NumberFormatter(config('payment.currency_locale'), NumberFormatter::CURRENCY);
        $moneyFormatter = new IntlMoneyFormatter($numberFormatter, new ISOCurrencies());

        return $moneyFormatter->format($money);
    }

}
