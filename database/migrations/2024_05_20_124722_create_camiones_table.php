<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

 class CreateCamionesTable extends Migration
{
    
    public function up(): void
    {
        Schema::create('camiones', function (Blueprint $table) {
            $table->id();
            $table->string('potencia');
            $table->string('matricula')->unique();
            $table->string('modelo');
            $table->string('tipo');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('camiones');
    }
};

