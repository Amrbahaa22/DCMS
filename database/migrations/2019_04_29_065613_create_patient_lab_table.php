<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientLabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_labs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedinteger('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->unsignedinteger('lab_id')->references('id')->on('labs')->onDelete('cascade');
            $table->Float('expenses');
            $table->string('type');
            $table->string('comment');
            $table->boolean('Paymentstatus');
            $table->date('Date');
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
        Schema::dropIfExists('patient_lab');
    }
}
