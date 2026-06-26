<?php

namespace App\Http\Controllers;

use App\Models\Paiement;
use App\Models\Facture;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    /**
     * Afficher la liste des paiements
     */
    public function index()
    {
        $paiements = Paiement::with('facture')->latest()->get();

        return view('paiements.index', compact('paiements'));
    }

    /**
     * Afficher le formulaire de paiement
     */
    public function create()
    {
        $factures = Facture::where('statut', '!=', 'Payee')
            ->where('statut', '!=', 'Payée')
            ->get();

        return view('paiements.create', compact('factures'));
    }

    /**
     * Enregistrer un paiement et mettre à jour la facture associée
     */
    public function payer(Request $request)
    {
        $request->validate([
            'facture_id' => 'required|exists:factures,id',
            'montant' => 'required|numeric|min:0',
            'mode' => 'required|string',
        ]);

        Paiement::create([
            'facture_id' => $request->facture_id,
            'montant' => $request->montant,
            'mode' => $request->mode,
            'reference_paiement' => uniqid('PAY-'),
            'statut' => 'Valide',
        ]);

        Facture::where('id', $request->facture_id)
            ->update(['statut' => 'Payée']);

        return redirect()
            ->route('paiements.index')
            ->with('success', 'Paiement enregistré avec succès');
    }
}
