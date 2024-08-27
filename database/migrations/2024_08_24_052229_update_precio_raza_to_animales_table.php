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
        Schema::table('animales', function (Blueprint $table) {
            $table->unsignedBigInteger('raza_id')->nullable(false)->change();
            $table->float('precio_compra')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('animales', function (Blueprint $table) {
            $table->unsignedBigInteger('raza_id')->nullable()->change();
            $table->float('precio_compra')->nullable(false)->change();
        });
    }
};
