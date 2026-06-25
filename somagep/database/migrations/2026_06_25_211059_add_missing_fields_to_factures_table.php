<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('factures', function (Blueprint $table) {

            $table->string('numero_facture')->unique()->after('id');

            $table->date('date_emission')->after('statut');

            $table->date('date_echeance')->after('date_emission');

        });
    }

    public function down(): void
    {
        Schema::table('factures', function (Blueprint $table) {

            $table->dropColumn([
                'numero_facture',
                'date_emission',
                'date_echeance'
            ]);

        });
    }
};