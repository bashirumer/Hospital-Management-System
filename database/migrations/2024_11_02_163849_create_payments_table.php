<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id('PaymentID');
            $table->date('PaymentDate');
            $table->decimal('Amount', 10, 2);
            $table->string('PaymentMethod', 50)->nullable();
            $table->foreignId('PatientID')->constrained('patients', 'PatientID')->onDelete('cascade');
            $table->foreignId('ReceptionistID')->constrained('receptionists', 'ReceptionistID')->onDelete('cascade');
            $table->foreignId('AppointmentID')->constrained('appointments', 'AppointmentID')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
