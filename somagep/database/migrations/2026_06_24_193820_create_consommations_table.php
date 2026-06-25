<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('consommations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('abonne_id')->constrained('abonnes')->onDelete('cascade');
            $table->integer('ancienne_valeur');
            $table->integer('nouvelle_valeur');
            $table->integer('consommation');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('consommations');
    }
};