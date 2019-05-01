<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('age');
            $table->string('address');
            $table->string('cellphone');
            $table->string('telephone')->nullable();
            $table->string('job');
            $table->boolean('attendance');
            $table->string('doctorName');
            $table->date('SubmitDate');
            $table->date('NextAppointment');
            $table->string('MedicalHistory', 500)->nullable();
            $table->string('DentalHistory', 500)->nullable();
            $table->string('ChiefComplain', 500)->nullable();

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
        Schema::dropIfExists('patients');
    }
}