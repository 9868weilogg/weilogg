<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->string('facebook_id')->nullable();
            $table->boolean('first_time')->default(1);
            $table->integer('transaction_quantity')->default(0);
            $table->string('invite_code',8)->unique()->nullable();
            $table->decimal('credit',5,2)->unsigned()->nullable();
            $table->string('profile_picture',100)->nullable();
            $table->integer('location_id')->unsigned()->nullable();
            $table->string('contact_number',13)->nullable();
            $table->integer('gender_id')->unsigned()->nullable();
            
            
            
            $table->timestamp('email_verified_at')->nullable();
            
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
        Schema::dropIfExists('users');
    }
}
