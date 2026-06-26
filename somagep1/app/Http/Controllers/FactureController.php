<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Abonne;
use App\Models\Consommation;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    /**
     * Prix unitaire du m3 d'eau (FCFA), utilisé pour le calcul automatique
     */
    const PRIX_UNITAIRE_M3 = 500;

    public function index()
    {
        try {
            $factures = Facture::with(['abonne', 'consommation'])->get();

            return view('factures.index', compact('factures'));
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur : ' . $e->getMessage());
        }
    }

    public function create()
    {
        $abonnes = Abonne::all();
        $consommations = Consommation::all();

        return view(
            'factures.create',
            compact('abonnes', 'consommations')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'abonne_id' => 'required|exists:abonnes,id',
            'consommation_id' => 'required|exists:consommations,id',
            'date_echeance' => 'required|date|after:today',
        ]);

        // Calcul automatique de la consommation et du montant
        $consommation = Consommation::findOrFail($request->consommation_id);
        $montant = $consommation->consommation * self::PRIX_UNITAIRE_M3;

        Facture::create([
            'numero_facture' => 'FACT-' . now()->format('Ymd') . '-' . strtoupper(uniqid()),
            'abonne_id' => $request->abonne_id,
            'consommation_id' => $request->consommation_id,
            'montant' => $montant,
            'statut' => 'Non payée',
            'date_emission' => now()->toDateString(),
            'date_echeance' => $request->date_echeance,
        ]);

        return redirect()
            ->route('factures.index')
            ->with('success', 'Facture générée automatiquement avec succès (montant calculé : ' . $montant . ' FCFA).');
    }

    public function show($id)
    {
        $facture = Facture::with(['abonne', 'consommation'])->findOrFail($id);

        return view('factures.show', compact('facture'));
    }

    public function edit($id)
    {
        $facture = Facture::findOrFail($id);
        $abonnes = Abonne::all();
        $consommations = Consommation::all();

        return view(
            'factures.edit',
            compact('facture', 'abonnes', 'consommations')
        );
    }

    public function update(Request $request, $id)
    {
        $facture = Facture::findOrFail($id);

        $request->validate([
            'abonne_id' => 'required|exists:abonnes,id',
            'consommation_id' => 'required|exists:consommations,id',
            'statut' => 'required',
            'date_echeance' => 'required|date',
        ]);

        // Recalcul automatique du montant si la consommation liée change
        $consommation = Consommation::findOrFail($request->consommation_id);
        $montant = $consommation->consommation * self::PRIX_UNITAIRE_M3;

        $facture->update([
            'abonne_id' => $request->abonne_id,
            'consommation_id' => $request->consommation_id,
            'montant' => $montant,
            'statut' => $request->statut,
            'date_echeance' => $request->date_echeance,
        ]);

        return redirect()
            ->route('factures.index')
            ->with('success', 'Facture mise à jour avec succès.');
    }

    public function destroy($id)
    {
        Facture::destroy($id);

        return redirect()
            ->route('factures.index')
            ->with('success', 'Facture supprimée avec succès.');
    }
}