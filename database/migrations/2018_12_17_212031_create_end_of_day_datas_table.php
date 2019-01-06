<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEndOfDayDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('end_of_day_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('stock_id');
            $table->decimal('high',8,4)->default('0.00');
            $table->decimal('low',8,4)->default('0.00');
            $table->decimal('close',8,4)->default('0.00');
            $table->decimal('open',8,4)->default('0.00');
            $table->decimal('high_52week',8,4)->default('0.00');
            $table->decimal('low_52week',8,4)->default('0.00');
            $table->decimal('roe',10,3)->default('0.0');
            $table->decimal('pe',8,3)->default('0.00');
            $table->decimal('eps',8,4)->default('0.00');
            $table->decimal('dps',8,4)->default('0.00');
            $table->decimal('dy',8,4)->default('0.00');
            $table->decimal('market_cap',10,3)->default('0.00');
            $table->bigInteger('volume')->default('0');
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
        Schema::dropIfExists('end_of_day_datas');
    }
}
