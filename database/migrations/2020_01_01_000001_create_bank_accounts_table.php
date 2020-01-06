<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankAccountsTable extends Migration
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
        Schema::create($this->prefix . 'bank_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->string('gateway_id')->nullable();
            $table->string('bank_code', 3);
            $table->string('office_number', 5);
            $table->string('account_number', 10);
            $table->string('account_digit', 2);
            $table->string('document_number', 18);
            $table->string('legal_name');
            $table->string('office_digit')->nullable();
            $table->string('type');
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
        Schema::dropIfExists($this->prefix . 'bank_accounts');
    }
}
