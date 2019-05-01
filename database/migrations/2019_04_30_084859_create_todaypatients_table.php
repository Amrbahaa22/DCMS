<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodaypatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todaypatients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('Date');
            $table->boolean('attendance');
            $table->timestamps();
        });
        DB::table('todaypatients')->insert([
            'name' => 'default',
            'Date' => '2010-04-30',
            'attendance'=>0,

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todaypatients');
    }
}
