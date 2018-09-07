<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGatereadyUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gateready_users', function (Blueprint $table) {
            $table->string('id',6);
            $table->primary('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->string('facebook_id');
            $table->tinyinteger('first_time')->unsigned();
            $table->integer('transaction_quantity')->unsigned();
            $table->string('invite_code',8)->unique();
            $table->decimal('credit',5,2)->unsigned()->nullable();
            $table->string('profile_picture',100)->nullable();
            $table->integer('location_id')->unsigned()->index();
            $table->string('contact_number',13);
            $table->integer('gender_id')->unsigned()->index();
            $table->rememberToken();
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
        Schema::dropIfExists('gateready_users');
    }
}
