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
        Schema::create('gestantes', function (Blueprint $table) {
            $table->id('id_gestacion');
            $table->date('Fecha_prenez');
            $table->date('Fecha_estimada');
            $table->date('Fecha_parto');
            $table->string('crias', 10);
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
        Schema::dropIfExists('gestantes');
    }
};
