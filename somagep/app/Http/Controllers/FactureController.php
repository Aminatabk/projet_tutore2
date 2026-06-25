<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Abonne;
use App\Models\Consommation;
use Illuminate\Http\Request;

class FactureController extends Controller
{
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
            'numero_facture' => 'required|unique:factures',
            'abonne_id' => 'required|exists:abonnes,id',
            'consommation_id' => 'required|exists:consommations,id',
            'montant' => 'required|numeric',
            'statut' => 'required',
            'date_emission' => 'required|date',
            'date_echeance' => 'required|date|after:date_emission',
        ]);

        Facture::create($request->all());

        return redirect()
            ->route('factures.index')
            ->with('success', 'Facture créée avec succès.');
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
            'numero_facture' => 'required|unique:factures,numero_facture,' . $id,
            'abonne_id' => 'required|exists:abonnes,id',
            'consommation_id' => 'required|exists:consommations,id',
            'montant' => 'required|numeric',
            'statut' => 'required',
            'date_emission' => 'required|date',
            'date_echeance' => 'required|date|after:date_emission',
        ]);

        $facture->update($request->all());

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