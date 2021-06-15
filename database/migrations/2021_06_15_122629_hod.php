<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Hod extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('hod', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id'); // Foreign Key From User Table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //$table->foreign('hod_id')->references('id')->on('hod')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
