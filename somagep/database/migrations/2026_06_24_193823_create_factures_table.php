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
        Schema::table('factures', function (Blueprint $table) {

            $table->unsignedBigInteger('abonne_id')->after('id');

            $table->unsignedBigInteger('consommation_id')->after('abonne_id');

            $table->decimal('montant', 10, 2)->after('consommation_id');

            $table->string('statut')
                  ->default('Non payée')
                  ->after('montant');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('factures', function (Blueprint $table) {

            $table->dropColumn([
                'abonne_id',
                'consommation_id',
                'montant',
                'statut'
            ]);

        });
    }
};