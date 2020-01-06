<?php

namespace Octo\Payment\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
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
        $this->setTable(config('payment.table_names.table_prefix', null) . 'companies');
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * @return BelongsTo
     */
    public function mainPaymentSetup(): BelongsTo
    {
        return $this->belongsTo('Octo\Payment\Models\PaymentConfig', 'main_payment_setup');
    }

    /**
     * @return BelongsTo
     */
    public function mainSplitRuleSetup(): BelongsTo
    {
        return $this->belongsTo('Octo\Payment\Models\SplitRule', 'main_split_rule_setup');
    }

    /**
     * @return BelongsToMany
     */
    public function recipients(): BelongsToMany
    {
        return $this->belongsToMany(
            'Octo\Payment\Models\Recipient',
            config('payment.table_names.table_prefix', null) . 'company_recipient',
            'company_id',
            'recipient_id'
        )->withTimestamps();
    }

    /**
     * @return HasMany
     */
    public function bankAccounts(): HasMany
    {
        return $this->hasMany('Octo\Payment\Models\BankAccount');
    }

    /**
     * @return HasMany
     */
    public function splitRules(): HasMany
    {
        return $this->hasMany('Octo\Payment\Models\SplitRule');
    }

    /**
     * @return HasMany
     */
    public function paymentConfigs(): HasMany
    {
        return $this->hasMany('Octo\Payment\Models\PaymentConfig');
    }

    /**
     * @return HasMany
     */
    public function billings(): HasMany
    {
        return $this->hasMany('Octo\Payment\Models\Billing');
    }
}
