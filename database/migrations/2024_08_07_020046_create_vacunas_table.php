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
        Schema::create('vacunas', function (Blueprint $table) {
            $table->id('id_vacuna');
            $table->string('nombre_vacuna', 45);
            $table->date('Fecha_administrada');
            $table->date('Fecha_programada');
            $table->unsignedBigInteger('animal_id');
            $table->foreign('animal_id')->references('id_animal')->on('animales')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacunas');
    }
};
