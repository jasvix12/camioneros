<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

 class CreatePaquetesTable extends Migration
{
   
    public function up(): void
    {
        Schema::create('paquetes', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->text('descripcion');
            $table->string('destinatario');
            $table->string('direccion');
            $table->foreignId('camionero_id')->nullable()->constrained('camioneros');
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('paquetes');
    }
};


