<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFundamentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fundamentals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('stock_id',10);
            $table->string('FYE',4);
            $table->decimal('PE',5,2)->default('0.00')->nullable();
            $table->decimal('DY',5,2)->default('0.00')->nullable();
            $table->decimal('EPS',8,4)->default('0.00')->nullable();
            $table->decimal('DPS',8,4)->default('0.00')->nullable();
            $table->decimal('net_profit_gr',6,2)->default('0.00')->nullable();
            $table->integer('share_qty')->unsigned()->default('0')->nullable();
            $table->integer('cash_equivalent')->unsigned()->default('0')->nullable();
            $table->integer('short_term_loan')->unsigned()->default('0')->nullable();
            $table->integer('long_term_loan')->unsigned()->default('0')->nullable();
            $table->decimal('gearing',8,4)->default('0.00')->nullable();
            $table->decimal('debt_equity',6,4)->default('0.00')->nullable();
            $table->decimal('gp_cashflow',5,2)->default('0.00')->nullable();
            $table->decimal('net_margin',5,2)->default('0.00')->nullable();
            $table->decimal('roe',5,2)->default('0.00')->nullable();
            $table->decimal('FCF_per_share',5,2)->default('0.00')->nullable();
            $table->decimal('roa',5,2)->default('0.00')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fundamentals');
    }
}
