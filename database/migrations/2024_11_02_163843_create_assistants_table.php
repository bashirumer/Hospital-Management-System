<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssistantsTable extends Migration
{
    public function up()
    {
        Schema::create('assistants', function (Blueprint $table) {
            $table->id('AssistantID');
            $table->string('Name', 100);
            $table->string('Phone', 15)->nullable();
            $table->string('email', 100)->unique();
            $table->string('password', 255);
            $table->foreignId('SectionID')->constrained('sections', 'SectionID')->onDelete('cascade');
            $table->foreignId('DoctorID')->constrained('doctors', 'DoctorID')->onDelete('cascade');
            // Additional field for doctor's name if needed
            $table->string('DoctorName', 100)->nullable(); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('assistants');
    }
}
