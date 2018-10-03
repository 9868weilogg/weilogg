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
            $table->decimal('PE',5,2);
            $table->decimal('DY',5,2);
            $table->decimal('EPS',8,4);
            $table->decimal('DPS',8,4);
            $table->decimal('net_profit_gr',6,2);
            $table->integer('revenue')->unsigned();
            $table->integer('cash_equivalent')->unsigned();
            $table->integer('short_term_loan')->unsigned();
            $table->integer('long_term_loan')->unsigned();
            $table->decimal('book_value',12,4);
            $table->decimal('gearing',6,4);
            $table->decimal('debt_equity',6,4);
            $table->decimal('FCF',5,2);
            $table->decimal('gp_cashflow',5,2);
            $table->decimal('net_margin',5,2);
            $table->decimal('roe',5,2);
            $table->decimal('roa',5,2);
            $table->decimal('asset_turnover',5,2);
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
