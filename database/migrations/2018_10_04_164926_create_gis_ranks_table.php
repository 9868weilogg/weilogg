<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGisRanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gis_ranks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('stock_id',20)->index();
            $table->integer('ba1')->unsigned()->nullable();
            $table->integer('ba1_1')->unsigned()->nullable();
            $table->integer('ba1_2')->unsigned()->nullable();
            $table->integer('ba1_3')->unsigned()->nullable();
            $table->integer('ba1_4')->unsigned()->nullable();
            $table->integer('ba1_5')->unsigned()->nullable();
            $table->integer('ba2')->unsigned()->nullable();
            $table->integer('ba3')->unsigned()->nullable();
            $table->integer('ba4')->unsigned()->nullable();
            $table->integer('ba5')->unsigned()->nullable();
            $table->integer('ba6')->unsigned()->nullable();
            $table->integer('ba7')->unsigned()->nullable();
            $table->integer('fa1')->unsigned()->nullable();
            $table->integer('fa2')->unsigned()->nullable();
            $table->integer('fa3')->unsigned()->nullable();
            $table->integer('fa4')->unsigned()->nullable();
            $table->integer('fa5')->unsigned()->nullable();
            $table->integer('fa6')->unsigned()->nullable();
            $table->integer('fa7')->unsigned()->nullable();
            $table->integer('buffettMark')->unsigned()->nullable();
            $table->integer('fisherMark')->unsigned()->nullable();
            
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
        Schema::dropIfExists('gis_ranks');
    }
}
