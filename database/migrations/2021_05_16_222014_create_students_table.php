<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id'); // Foreign Key From User Table
            $table->string('name');
            $table->string('program');
            $table->string('progress');
            $table->string('department');
            $table->unsignedInteger('supervisor_id'); // Foreign Key From Supervisor Table
            $table->unsignedInteger('co-supervisor_id'); // Foreign Key From Co-supervisor Table
            $table->unsignedInteger('proposal_id'); // Foreign Key From Proposal Table
            $table->unsignedInteger('thesis_id'); // Foreign Key From Thesis Table
            $table->unsignedInteger('progress_id'); // Foreign Key From Progress Table
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('supervisor_id')->references('id')->on('supervisor')->onDelete('cascade');
            // $table->foreign('proposal_id')->references('id')->on('proposals')->onDelete('cascade');
            // $table->foreign('thesis_id')->references('id')->on('thesis')->onDelete('cascade');
            // $table->foreign('progress_id')->references('id')->on('progress_reports')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
