<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('consommations', function (Blueprint $table) {

            $table->unsignedBigInteger('abonne_id')->after('id');

            $table->integer('ancienne_valeur')->after('abonne_id');

            $table->integer('nouvelle_valeur')->after('ancienne_valeur');

            $table->integer('consommation')->after('nouvelle_valeur');

        });
    }

    public function down(): void
    {
        Schema::table('consommations', function (Blueprint $table) {

            $table->dropColumn([
                'abonne_id',
                'ancienne_valeur',
                'nouvelle_valeur',
                'consommation'
            ]);

        });
    }
};