<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->id('SessionID');
            $table->date('SessionDate');
            $table->time('SessionTime');
            $table->foreignId('DoctorID')->constrained('doctors', 'DoctorID')->onDelete('cascade');
            $table->foreignId('PatientID')->constrained('patients', 'PatientID')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}
