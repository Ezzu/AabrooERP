<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsDonarsModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_donars', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('student_id');
            $table->unsignedInteger('donar_id');
            $table->unsignedInteger('sponser_type')->nullable();
            
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedInteger('deleted_by')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('donar_id')->references('id')->on('donars');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->foreign('deleted_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students_donars');
    }
}
