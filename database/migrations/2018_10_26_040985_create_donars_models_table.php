<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonarsModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donars', function (Blueprint $table) {
            $table->increments('id');
            $table->date('sponsership_date')->nullable();
            $table->string('donar_name')->nullable();
            $table->string('address')->nullable();
            $table->string('cnic')->nullable();
            $table->unsignedInteger('area_id')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('cell_no')->nullable();
            $table->string('email')->nullable();
            $table->integer('sponser_count')->default(0)->nullable();
            $table->integer('fee_per_child')->nullable();
            $table->unsignedInteger('payment_type_id')->nullable();
            $table->integer('status')->default(1);

            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedInteger('deleted_by')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->foreign('deleted_by')->references('id')->on('users');
            $table->foreign('area_id')->references('id')->on('areas');
            $table->foreign('payment_type_id')->references('id')->on('payment_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donars');
    }
}
