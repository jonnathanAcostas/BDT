<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_times', function (Blueprint $table) {
            $table->id();
            
            $table->integer('hours_pay');
            $table->date('exchange_date');
            $table->date('exchange_detail');
            $table->string('exchange_comment');
            $table->string('user_rating');
            $table->timestamps();

            //declaración clave foranea
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pay_times');
    }
}
