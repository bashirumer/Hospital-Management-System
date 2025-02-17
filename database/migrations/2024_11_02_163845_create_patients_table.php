<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id('PatientID');
            $table->string('Name', 100);
            $table->date('DateOfBirth')->nullable();
            $table->string('Address', 255)->nullable();
            $table->string('Phone', 15)->nullable();
            $table->string('email', 100)->unique();
            $table->string('password', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
