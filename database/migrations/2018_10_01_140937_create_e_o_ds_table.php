<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEODsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_o_ds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('stock_id',20)->index();
            $table->string('late_refereshed',10);
            $table->string('date',10);
            $table->decimal('open',9,4);
            $table->decimal('high',9,4);
            $table->decimal('low',9,4);
            $table->decimal('close',9,4);
            $table->integer('volume')->unsigned();
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
        Schema::dropIfExists('e_o_ds');
    }
}
