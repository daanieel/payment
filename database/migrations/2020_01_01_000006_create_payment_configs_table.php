<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentConfigsTable extends Migration
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
        Schema::create($this->prefix . 'payment_configs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->string('name');
            $table->text('description');
            $table->string('late_payment_type');
            $table->decimal('late_payment_percent', 5, 2)->nullable();
            $table->decimal('late_payment_amount', 7, 2)->nullable();
            $table->decimal('late_payment_daily_interest', 5, 2)->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('company_id')->references('id')->on($this->prefix . 'companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->prefix . 'payment_configs');
    }
}
