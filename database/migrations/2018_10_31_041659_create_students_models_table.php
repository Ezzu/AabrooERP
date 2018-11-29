<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('admission_date')->nullable();
            $table->string('name')->nullable();
            $table->unsignedInteger('gender')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('cnic')->nullable();
            $table->unsignedInteger('class')->nullable();
            $table->unsignedInteger('roll_no')->nullable();
            $table->unsignedInteger('shift')->nullable();

            $table->string('father_name')->nullable();
            $table->string('father_cnic')->nullable();
            $table->unsignedInteger('father_education')->nullable();
            $table->unsignedInteger('father_professional_status')->nullable();

            $table->string('mother_name')->nullable();
            $table->string('mother_cnic')->nullable();
            $table->unsignedInteger('mother_education')->nullable();
            $table->unsignedInteger('mother_professional_status')->nullable();

            $table->string('permanent_address')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('cell_no')->nullable();

            $table->unsignedInteger('no_of_children')->nullable();
            $table->unsignedInteger('male')->nullable();
            $table->unsignedInteger('female')->nullable();

            $table->unsignedInteger('religion')->nullable();
            $table->unsignedInteger('guardian_occupation')->nullable();
            $table->unsignedInteger('residential_status')->nullable();

            $table->unsignedInteger('father_income')->nullable();
            $table->unsignedInteger('mother_income')->nullable();
            $table->unsignedInteger('other_income')->nullable();

            $table->string('guarantor_name')->nullable();
            $table->string('guarantor_relation')->nullable();
            $table->string('guarantor_cnic')->nullable();
            $table->string('guarantor_address')->nullable();
            $table->string('guarantor_contact')->nullable();

            $table->unsignedInteger('eyesight')->nullable();
            $table->unsignedInteger('hearing')->nullable();
            $table->unsignedInteger('weight')->nullable();
            $table->unsignedInteger('height')->nullable();

            $table->unsignedInteger('bcg')->nullable();
            $table->unsignedInteger('polio')->nullable();
            $table->unsignedInteger('dpt')->nullable();
            $table->unsignedInteger('measles')->nullable();
            $table->unsignedInteger('mr')->nullable();
            $table->unsignedInteger('hepatitis')->nullable();

            $table->unsignedInteger('chest_xray')->nullable();
            $table->unsignedInteger('blood_cbcesr')->nullable();
            $table->unsignedInteger('spuntum_afb')->nullable();
            $table->unsignedInteger('blood_group')->nullable();

            $table->unsignedInteger('diabetes')->nullable();
            $table->unsignedInteger('hypertension')->nullable();
            $table->unsignedInteger('tab_chest')->nullable();
            $table->unsignedInteger('myocardial_impaction')->nullable();
            $table->unsignedInteger('congenital_deformity')->nullable();
            $table->unsignedInteger('others')->nullable();

            $table->string('image')->nullable();
            $table->integer('status')->default(1);

            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedInteger('deleted_by')->nullable();

            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('students');
    }
}
