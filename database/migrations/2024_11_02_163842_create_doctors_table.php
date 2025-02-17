<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id('DoctorID');
            $table->string('Name', 100);
            $table->string('Specialization', 100)->nullable();
            $table->string('Phone', 15)->nullable();
            $table->string('email', 100)->unique();
            $table->string('password', 255);
            $table->foreignId('SectionID')->constrained('sections', 'SectionID')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
