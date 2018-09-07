<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->string('reference_number',12)->primary();
            $table->string('gateready_user_id',6)->index();
            $table->string('tracking_number',50);
            $table->integer('courier_id')->unsigned()->index();
            $table->integer('package_id')->unsigned()->index();
            $table->text('order_date');
            $table->text('schedule_date');
            $table->integer('time_range_id')->unsigned()->index();
            $table->integer('status_id')->unsigned()->index();
            $table->text('message');
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
        Schema::dropIfExists('records');
    }
}
