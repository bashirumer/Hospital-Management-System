<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalReportsTable extends Migration
{
    public function up()
    {
        Schema::create('medical_reports', function (Blueprint $table) {
            $table->id('ReportID');
            $table->date('ReportDate');
            $table->text('Content')->nullable();
            $table->foreignId('DoctorID')->constrained('doctors', 'DoctorID')->onDelete('cascade');
            $table->foreignId('PatientID')->constrained('patients', 'PatientID')->onDelete('cascade');
            $table->foreignId('SessionID')->constrained('sessions', 'SessionID')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('medical_reports');
    }
}
