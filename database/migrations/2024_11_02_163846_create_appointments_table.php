<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id('AppointmentID');
            $table->date('Date');
            $table->time('Time');
            $table->foreignId('PatientID')->constrained('patients', 'PatientID')->onDelete('cascade');
            $table->foreignId('DoctorID')->constrained('doctors', 'DoctorID')->onDelete('cascade');
            $table->foreignId('ReceptionistID')->constrained('receptionists', 'ReceptionistID')->onDelete('cascade');
            $table->enum('Status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
