<?php

namespace App\Http\Controllers;

use App\Models\Reclamation;
use App\Models\Abonne;
use Illuminate\Http\Request;

class ReclamationController extends Controller
{
    /**
     * Afficher la liste des réclamations
     */
    public function index()
    {
        $reclamations = Reclamation::with('abonne')->get();
        return view('reclamations.index', compact('reclamations'));
    }

    /**
     * Afficher le formulaire d'ajout
     */
    public function create()
    {
        $abonnes = Abonne::all();
        return view('reclamations.create', compact('abonnes'));
    }

    /**
     * Enregistrer une nouvelle réclamation
     */
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'abonne_id' => 'required|exists:abonnes,id',
            'objet' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Création de la réclamation
        Reclamation::create([
            'abonne_id' => $request->abonne_id,
            'objet' => $request->objet,
            'description' => $request->description,
            'statut' => 'En attente',
            'date_reclamation' => now(),
        ]);

        return redirect()
            ->route('reclamations.index')
            ->with('success', 'Réclamation ajoutée avec succès');
    }

    /**
     * Afficher une réclamation spécifique
     */
    public function show($id)
    {
        $reclamation = Reclamation::with('abonne')->findOrFail($id);
        return view('reclamations.show', compact('reclamation'));
    }

    /**
     * Afficher le formulaire de modification
     */
    public function edit($id)
    {
        $reclamation = Reclamation::findOrFail($id);
        $abonnes = Abonne::all();
        return view('reclamations.edit', compact('reclamation', 'abonnes'));
    }

    /**
     * Mettre à jour une réclamation
     */
    public function update(Request $request, $id)
    {
        $reclamation = Reclamation::findOrFail($id);

        $request->validate([
            'abonne_id' => 'required|exists:abonnes,id',
            'objet' => 'required|string|max:255',
            'description' => 'required|string',
            'statut' => 'required|in:En attente,En cours,Traitée,Rejetée',
        ]);

        $reclamation->update([
            'abonne_id' => $request->abonne_id,
            'objet' => $request->objet,
            'description' => $request->description,
            'statut' => $request->statut,
        ]);

        return redirect()
            ->route('reclamations.index')
            ->with('success', 'Réclamation mise à jour avec succès');
    }

    /**
     * Traiter une réclamation (changer le statut)
     */
    public function traiter($id)
    {
        $reclamation = Reclamation::findOrFail($id);
        
        $reclamation->update([
            'statut' => 'Traitée'
        ]);

        return redirect()
            ->route('reclamations.index')
            ->with('success', 'Réclamation traitée avec succès');
    }

    /**
     * Marquer une réclamation comme en cours
     */
    public function encours($id)
    {
        $reclamation = Reclamation::findOrFail($id);
        
        $reclamation->update([
            'statut' => 'En cours'
        ]);

        return redirect()
            ->route('reclamations.index')
            ->with('success', 'Réclamation en cours de traitement');
    }

    /**
     * Rejeter une réclamation
     */
    public function rejeter($id)
    {
        $reclamation = Reclamation::findOrFail($id);
        
        $reclamation->update([
            'statut' => 'Rejetée'
        ]);

        return redirect()
            ->route('reclamations.index')
            ->with('success', 'Réclamation rejetée');
    }

    /**
     * Supprimer une réclamation
     */
    public function destroy($id)
    {
        $reclamation = Reclamation::findOrFail($id);
        $reclamation->delete();

        return redirect()
            ->route('reclamations.index')
            ->with('success', 'Réclamation supprimée avec succès');
    }
}