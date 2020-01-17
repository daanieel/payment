<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReferenceForeignKeys extends Migration
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
        Schema::table($this->prefix . 'companies', function (Blueprint $table) {
            $table->foreign('main_payment_setup')->references('id')->on($this->prefix . 'payment_configs');
            $table->foreign('main_split_rule_setup')->references('id')->on($this->prefix . 'split_rules');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table($this->prefix . 'companies', function (Blueprint $table) {
            $table->dropForeign(['main_payment_setup']);
            $table->dropForeign(['main_split_rule_setup']);
        });
    }
}
