<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeoplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peoples', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 100);
            $table->string('second_name', 100)->nullable();
            $table->string('first_surname', 100);
            $table->string('second_surname', 100)->nullable();
            $table->string('phone');
            $table->bigInteger('cash_receipt_id')->unsigned();
            $table->timestamps();

            $table->foreign('cash_receipt_id')->references('id')->on('cash_receipts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peoples');
    }
}
