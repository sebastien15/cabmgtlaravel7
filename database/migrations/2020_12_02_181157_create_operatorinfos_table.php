<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperatorinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operatorinfos', function (Blueprint $table) {
            $table->id();
            $table->unSignedBigInteger('operator_id');
            $table->string('phone');
            $table->string('company_name');
            $table->string('number_plate');
            $table->string('profile_pic');
            $table->unSignedBigInteger('car_id');
            $table->timestamps();
            $table->foreign('operator_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operatorinfos');
    }
}
