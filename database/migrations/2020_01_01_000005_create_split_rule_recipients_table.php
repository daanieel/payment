<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSplitRuleRecipientsTable extends Migration
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
        Schema::create($this->prefix . 'split_rule_recipients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('split_rule_id')->unsigned();
            $table->integer('recipient_id')->unsigned();
            $table->integer('amount')->nullable();
            $table->integer('percentage')->nullable();
            $table->boolean('charge_processing_fee')->nullable();
            $table->boolean('liable')->nullable();
            $table->boolean('charge_remainder')->nullable();
            $table->timestamps();
            $table->foreign('split_rule_id')->references('id')->on($this->prefix . 'split_rules');
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
        Schema::dropIfExists($this->prefix . 'split_rule_recipients');
    }
}
