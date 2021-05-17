<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progress_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('student_id');
            $table->string('name');
            $table->string('report_type');
            $table->dateTime('submission_date');
            $table->string('submission_status');
            $table->string('file_path');
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
        Schema::dropIfExists('progress_reports');
    }
}
