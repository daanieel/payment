<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillingsTable extends Migration
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
        Schema::create($this->prefix . 'billings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->integer('payment_config_id')->unsigned();
            $table->integer('split_rule_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('amount');
            $table->integer('amount_paid')->nullable();
            $table->string('type');
            $table->string('payment_method');
            $table->integer('manually_marked_as_paid')->nullable();
            $table->string('status');
            $table->date('expiration_at');
            $table->dateTime('paid_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('company_id')->references('id')->on($this->prefix . 'companies');
            $table->foreign('payment_config_id')->references('id')->on($this->prefix . 'payment_configs');
            $table->foreign('split_rule_id')->references('id')->on($this->prefix . 'split_rules');
            $table->foreign('customer_id')->references('id')->on($this->prefix . 'customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->prefix . 'billings');
    }
}
