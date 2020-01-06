<?php

return [

    'table_names' => [

        /*
         * Selecione um prefixo para as tabelas, caso queira separar das demais tabelas
         * do seu sistema, Ex: 'pay_billing', 'payment_billing'. Não esqueça de coloar
         * o underline depois do prefixo exemplo 'pay_' ou 'payment_'
         */

        'table_prefix' => 'pay_',

        /*
         * Essa e tabela de relacionamento com a 'model' e o 'customer' Nós escolhemos um
         * nome padrão básico 'model_customers', mas você pode alterá-lo facilmente para
         * qualquer tabela que desejar.
         */

        'model_customers' => 'model_customers',

    ],

    'column_names' => [

        /*
         * Altere isso se desejar nomear o relacionamento do 'model' com 'customer'
         * relacionado diferente de 'model_type' e 'model_id' na tabela de 'model_customers'
         */

        'model_morph_name' => 'model',
    ],

    /*
     * Essa é a moeda padrão que será usada ao gerar cobranças a partir do seu aplicativo.
     *
     * Padrão é 'brl'
    */

    'currency' => env('PAYMENT_CURRENCY', 'brl'),

    /*
     * Este é o código de idioma padrão no qual seus valores monetários são formatados
     * para exibição.
     *
     * Padrão é 'pt_BR'
    */

    'currency_locale' => env('PAYMENT_CURRENCY_LOCALE', 'pt_BR'),

    'pagarme' => [

        'env' => env('PAYMENT_PAGARME_ENV', 'test'),

        'api_key_live' => env('PAYMENT_PAGARME_API_KEY_LIVE', null),

        'api_key_test' => env('PAYMENT_PAGARME_API_KEY_TEST', null),

        'encryption_key_live' => env('PAYMENT_PAGARME_ENCRYPTION_KEY_LIVE', null),

        'encryption_key_test' => env('PAYMENT_PAGARME_ENCRYPTION_KEY_TEST', null),

        'postbackurl' => env('PAYMENT_PAGARME_POSTBACKURL', null),

    ]
];
