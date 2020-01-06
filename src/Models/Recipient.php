<?php

namespace Octo\Payment\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Recipient extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Create a new model instance.
     *
     * @param array $attributes
     */
    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(config('payment.table_names.table_prefix', null) . 'recipients');
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * @return BelongsToMany
     */
    public function companies(): BelongsToMany
    {
        return $this->belongsToMany(
            'Octo\Payment\Models\Company',
            config('payment.table_names.table_prefix', null) . 'company_recipient',
            'recipient_id',
            'company_id'
        )->withTimestamps();
    }

    /**
     * @return BelongsTo
     */
    public function bankAccount(): BelongsTo
    {
        return $this->belongsTo('Octo\Payment\Models\BankAccount');
    }

    /**
     * @return BelongsToMany
     */
    public function splitRules(): BelongsToMany
    {
        return $this->belongsToMany(
            'Octo\Payment\Models\SplitRule',
            config('payment.table_names.table_prefix', null) . 'split_rule_recipients',
            'recipient_id',
            'split_rule_id'
        )->withTimestamps();
    }

}
