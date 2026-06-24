<?php

namespace App\Http\Controllers;

use App\Models\Paiement;
use App\Models\Facture;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    public function payer(Request $request)
    {
        Paiement::create([
            'facture_id' => $request->facture_id,
            'montant' => $request->montant,
            'mode' => $request->mode,
            'reference_paiement' => uniqid(),
            'statut' => 'Valide'
        ]);

        Facture::where(
            'id',
            $request->facture_id
        )->update([
            'statut' => 'Payee'
        ]);

        return back();
    }
}