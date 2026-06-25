<?php

namespace App\Http\Controllers;

use App\Models\Abonne;
use Illuminate\Http\Request;

class AbonneController extends Controller
{
    /**
     * Afficher la liste des abonnés
     */
    public function index()
    {
        $abonnes = Abonne::all();

        return view('abonnes.index', compact('abonnes'));
    }

    /**
     * Afficher le formulaire d'ajout
     */
    public function create()
    {
        return view('abonnes.create');
    }

    /**
     * Enregistrer un nouvel abonné
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'telephone' => 'required',
        ]);

        Abonne::create($request->only([
            'nom',
            'prenom',
            'adresse',
            'telephone',
            'email'
        ]));

        return redirect()
            ->route('abonnes.index')
            ->with('success', 'Abonné ajouté avec succès');
    }

    /**
     * Afficher un abonné
     */
    public function show($id)
    {
        $abonne = Abonne::findOrFail($id);

        return view('abonnes.show', compact('abonne'));
    }

    /**
     * Formulaire de modification
     */
    public function edit($id)
    {
        $abonne = Abonne::findOrFail($id);

        return view('abonnes.edit', compact('abonne'));
    }

    /**
     * Mettre à jour un abonné
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'telephone' => 'required',
        ]);

        $abonne = Abonne::findOrFail($id);

        $abonne->update($request->only([
            'nom',
            'prenom',
            'adresse',
            'telephone',
            'email'
        ]));

        return redirect()
            ->route('abonnes.index')
            ->with('success', 'Abonné modifié avec succès');
    }

    /**
     * Supprimer un abonné
     */
    public function destroy($id)
    {
        Abonne::findOrFail($id)->delete();

        return redirect()
            ->route('abonnes.index')
            ->with('success', 'Abonné supprimé');
    }
}