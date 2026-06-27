<?php

namespace App\Http\Controllers;

use App\Models\Abonne;
use Illuminate\Http\Request;

class AbonneController extends Controller
{
    /**
     * Afficher la liste des abonnés (avec recherche)
     */
    public function index(Request $request)
    {
        $recherche = $request->input('q');

        $abonnes = Abonne::when($recherche, function ($query, $recherche) {
                $query->where(function ($q) use ($recherche) {
                    $q->where('nom', 'like', "%{$recherche}%")
                      ->orWhere('prenom', 'like', "%{$recherche}%")
                      ->orWhere('telephone', 'like', "%{$recherche}%")
                      ->orWhere('email', 'like', "%{$recherche}%");
                });
            })
            ->orderBy('nom')
            ->get();

        return view('abonnes.index', compact('abonnes', 'recherche'));
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
}