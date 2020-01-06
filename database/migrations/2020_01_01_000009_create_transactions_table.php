<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * The database schema.
     *
     * @var Schema
     */
    protected $prefix;

    /**
     * Create a new migration instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->prefix = config('payment.table_names.table_prefix', null);
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->prefix . 'transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->morphs('transactionable');
            $table->string('gateway_id')->nullable();
            $table->string('customer_gateway_id')->nullable();
            $table->integer('amount');
            $table->integer('amount_paid')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('boleto_url')->nullable();
            $table->string('status')->nullable();
            $table->date('expiration_at')->nullable();
            $table->dateTime('paid_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->prefix . 'transactions');
    }
}
