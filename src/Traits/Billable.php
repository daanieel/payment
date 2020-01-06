<?php

namespace Octo\Payment\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait Billable
{
    /**
     * A model may have multiple roles.
     */
    public function customers(): MorphToMany
    {
        return $this->morphToMany(
            'Octo\Payment\Models\Customer',
            config('payment.column_names.model_morph_name'),
            config('payment.table_names.table_prefix', null) . config('payment.table_names.model_customers'),
            config('payment.column_names.model_morph_name') . '_id',
            'customer_id'
        );
    }

    /**
     * @return MorphMany
     */
    public function billings(): MorphMany
    {
        return $this->morphMany('Octo\Payment\Models\Billing', 'billable');
    }

}
