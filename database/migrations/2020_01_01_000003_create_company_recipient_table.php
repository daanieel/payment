<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyRecipientTable extends Migration
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
        Schema::create($this->prefix . 'company_recipient', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->integer('recipient_id')->unsigned();
            $table->timestamps();
            $table->foreign('company_id')->references('id')->on($this->prefix . 'companies');
            $table->foreign('recipient_id')->references('id')->on($this->prefix . 'recipients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->prefix . 'company_recipient');
    }
}
