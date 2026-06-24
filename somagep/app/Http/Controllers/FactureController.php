<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Consommation;

class FactureController extends Controller
{
    public function generer($id)
    {
        $conso = Consommation::findOrFail($id);

        $montant = $conso->consommation * 500;

        Facture::create([
            'abonne_id' => $conso->abonne_id,
            'numero_facture' => 'FAC'.time(),
            'montant' => $montant,
            'date_facture' => now(),
            'date_echeance' => now()->addDays(30),
            'statut' => 'Non Payee'
        ]);

        return back();
    }
}