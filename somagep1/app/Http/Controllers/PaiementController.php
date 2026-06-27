<?php

namespace App\Http\Controllers;

use App\Models\Paiement;
use App\Models\Facture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaiementController extends Controller
{
    /**
     * Afficher la liste des paiements (admin/agent)
     */
    public function index()
    {
        $paiements = Paiement::with('facture')->latest()->get();

        return view('paiements.index', compact('paiements'));
    }

    /**
     * Afficher le formulaire de paiement (client)
     */
    public function create()
    {
        $factures = Facture::with('abonne')
            ->where('statut', '!=', 'Payee')
            ->where('statut', '!=', 'Payée')
            ->get();

        return view('paiements.create', compact('factures'));
    }

    /**
     * Enregistrer un paiement et mettre à jour la facture associée
     *
     * Le montant n'est jamais pris depuis le formulaire : il est toujours
     * recalculé côté serveur à partir de la facture choisie, pour éviter
     * qu'un montant erroné ou falsifié soit enregistré.
     */
    public function payer(Request $request)
    {
        $request->validate([
            'facture_id' => 'required|exists:factures,id',
            'mode' => 'required|string',
        ]);

        $facture = Facture::findOrFail($request->facture_id);

        if ($facture->statut === 'Payée' || $facture->statut === 'Payee') {
            return back()->with('error', 'Cette facture a déjà été payée.');
        }

        Paiement::create([
            'facture_id' => $facture->id,
            'montant' => $facture->montant,
            'mode' => $request->mode,
            'reference_paiement' => uniqid('PAY-'),
            'statut' => 'Valide',
        ]);

        $facture->update(['statut' => 'Payée']);

        if (in_array(Auth::user()->role, ['admin', 'agent'])) {
            return redirect()
                ->route('paiements.index')
                ->with('success', 'Paiement enregistré avec succès');
        }

        return redirect()
            ->route('client.factures')
            ->with('success', 'Votre paiement de ' . $facture->montant . ' FCFA a été enregistré avec succès');
    }
}