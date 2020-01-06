<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipientsTable extends Migration
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
        Schema::create($this->prefix . 'recipients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->string('gateway_id')->nullable();
            $table->integer('bank_account_id')->unsigned();
            $table->string('gateway_bank_account_id')->nullable();
            $table->string('transfer_interval')->nullable();
            $table->integer('transfer_day')->nullable();
            $table->boolean('transfer_enabled');
            $table->boolean('automatic_anticipation_enabled');
            $table->integer('anticipatable_volume_percentage')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('bank_account_id')->references('id')->on($this->prefix . 'bank_accounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->prefix . 'recipients');
    }
}
