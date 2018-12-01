<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->string('id',6)->primary();
            $table->string('type',8);
            $table->integer('unit');
            $table->decimal('price',8,3);
            $table->string('stock_id',10)->index();
            $table->string('user_id',6)->index();
            $table->decimal('gross_amount',12,2);
            $table->decimal('brokerage',12,2);
            $table->decimal('clearing_fee',12,2);
            $table->decimal('sst_payable',12,2);
            $table->decimal('stamp_duty',12,2);
            $table->decimal('total_amount_due',12,2);
            $table->string('payment_due_date',20);
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
        Schema::dropIfExists('transactions');
    }
}
