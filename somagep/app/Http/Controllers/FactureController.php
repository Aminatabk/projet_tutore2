<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    public function index()
    {
        try {
            $factures = Facture::with('abonne')->get();
            return view('factures.index', compact('factures'));
        } catch (\Exception $e) {
            // En cas d'erreur, retourner une vue avec un message
            return back()->with('error', 'Erreur : ' . $e->getMessage());
        }
    }

    public function create()
    {
        $abonnes = Abonne::all();
        return view('factures.create', compact('abonnes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero_facture' => 'required|unique:factures',
            'abonne_id' => 'required|exists:abonnes,id',
            'montant' => 'required|numeric',
            'statut' => 'required',
            'date_emission' => 'required|date',
            'date_echeance' => 'required|date|after:date_emission',
        ]);

        Facture::create($request->all());

        return redirect()->route('factures.index')
            ->with('success', 'Facture créée avec succès');
    }

    public function show($id)
    {
        $facture = Facture::with('abonne')->findOrFail($id);
        return view('factures.show', compact('facture'));
    }

    public function edit($id)
    {
        $facture = Facture::findOrFail($id);
        $abonnes = Abonne::all();
        return view('factures.edit', compact('facture', 'abonnes'));
    }

    public function update(Request $request, $id)
    {
        $facture = Facture::findOrFail($id);
        
        $request->validate([
            'numero_facture' => 'required|unique:factures,numero_facture,' . $id,
            'abonne_id' => 'required|exists:abonnes,id',
            'montant' => 'required|numeric',
            'statut' => 'required',
            'date_emission' => 'required|date',
            'date_echeance' => 'required|date|after:date_emission',
        ]);

        $facture->update($request->all());

        return redirect()->route('factures.index')
            ->with('success', 'Facture mise à jour avec succès');
    }

    public function destroy($id)
    {
        $facture = Facture::findOrFail($id);
        $facture->delete();

        return redirect()->route('factures.index')
            ->with('success', 'Facture supprimée avec succès');
    }
}