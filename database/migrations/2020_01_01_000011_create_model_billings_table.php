<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelBillingsTable extends Migration
{
    /**
     * The database schema.
     *
     * @var Schema
     */
    protected $prefix;
    protected $columnNames;
    protected $tableNames;

    /**
     * Create a new migration instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->prefix = config('payment.table_names.table_prefix', null);
        $this->columnNames = config('payment.column_names');
        $this->tableNames = config('payment.table_names');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->prefix . $this->tableNames['model_billings'], function (Blueprint $table) {
            $table->increments('id');
            $table->morphs($this->columnNames['model_morph_name']);
            $table->integer('billing_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('billing_id')->references('id')->on($this->prefix . 'billings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->prefix . $this->tableNames['model_billings']);
    }
}
