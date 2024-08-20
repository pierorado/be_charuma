<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('animales', function (Blueprint $table) {
            $table->id('id_animal');
            $table->integer('arete')->unique();
            $table->enum('ingreso', ['Nacimiento', 'Compra']);
            $table->string('nombre_animal', 45);
            $table->date('fecha');
            $table->enum('sexo', ['Macho', 'Hembra']);
            $table->enum('clasificacion', ['Vacas', 'Toros', 'Terneros', 'Terneras', 'Vaquillonas']);
            $table->float('precio_compra');
            $table->enum('estado', ['Activo', 'Muerto', 'Vendido']);
            $table->unsignedBigInteger('raza_id')->nullable();
            $table->foreign('raza_id')->references('id_raza')->on('razas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animales');
    }
};
