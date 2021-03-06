<?php

namespace Octo\Payment\Traits;

use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait Billable
{
    public function billings(): MorphToMany
    {
        return $this->morphToMany(
            'Octo\Payment\Models\Billing',
            config('payment.column_names.model_morph_name'),
            config('payment.table_names.table_prefix', null) . config('payment.table_names.model_billings'),
            config('payment.column_names.model_morph_name') . '_id',
            'billing_id'
        )->withTimestamps();
    }

}
