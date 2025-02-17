<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceptionistsTable extends Migration
{
    public function up()
    {
        Schema::create('receptionists', function (Blueprint $table) {
            $table->id('ReceptionistID');
            $table->string('Name', 100);
            $table->string('Phone', 15)->nullable();
            $table->string('email', 100)->unique();
            $table->string('password', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('receptionists');
    }
}
