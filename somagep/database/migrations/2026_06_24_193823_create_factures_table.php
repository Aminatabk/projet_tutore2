<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->string('numero_facture')->unique();
            $table->foreignId('abonne_id')->constrained('abonnes')->onDelete('cascade');
            $table->foreignId('consommation_id')->constrained('consommations')->onDelete('cascade');
            $table->decimal('montant', 10, 2);
            $table->string('statut')->default('Non payée');
            $table->date('date_emission');
            $table->date('date_echeance');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('factures');
    }
};