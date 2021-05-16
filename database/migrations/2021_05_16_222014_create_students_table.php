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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
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
