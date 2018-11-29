<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSWEmployeesModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swemployees', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('employee_id')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->unsignedInteger('area_id')->nullable();
            $table->unsignedInteger('day_id')->nullable();
            $table->integer('status')->default(1);

            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedInteger('deleted_by')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->foreign('deleted_by')->references('id')->on('users');
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('area_id')->references('id')->on('areas');
            $table->foreign('day_id')->references('id')->on('working_days');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('swemployees');
    }
}
