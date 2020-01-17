<?php

namespace Octo\Payment\Traits;

use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait HasCustomers
{
    public function customers(): MorphToMany
    {
        return $this->morphToMany(
            'Octo\Payment\Models\Customer',
            config('payment.column_names.model_morph_name'),
            config('payment.table_names.table_prefix', null) . config('payment.table_names.model_customers'),
            config('payment.column_names.model_morph_name') . '_id',
            'customer_id'
        )->withTimestamps();
    }

}
