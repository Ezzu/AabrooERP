<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('branch_id');
            $table->unsignedInteger('department_id');
            $table->unsignedInteger('job_title_id');
            $table->unsignedInteger('bank_id');

            $table->string('date_of_joining')->nullable();
            $table->string('name')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('cnic')->nullable();
            $table->string('father_name')->nullable();   
            $table->string('contact')->nullable();
            $table->string('email')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('temporary_address')->nullable();
            $table->string('city')->nullable();
            
            $table->string('account_no')->nullable();
            $table->string('basic_salary')->nullable();
            $table->string('medical_allowance')->nullable();
            $table->string('conveyance')->nullable();
            $table->string('image')->nullable();
            
            $table->integer('status')->default(1);
            
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedInteger('deleted_by')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('job_title_id')->references('id')->on('job_titles');
            $table->foreign('bank_id')->references('id')->on('banks');
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
        Schema::dropIfExists('employees_models');
    }
}