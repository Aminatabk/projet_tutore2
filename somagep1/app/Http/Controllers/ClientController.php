<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Tableau de bord du client : uniquement ses propres données
     */
    public function dashboard()
    {
        $abonne = Auth::user()->abonne;

        $totalFactures = $abonne ? $abonne->factures()->count() : 0;
        $totalConsommations = $abonne ? $abonne->consommations()->count() : 0;
        $totalReclamations = $abonne ? $abonne->reclamations()->count() : 0;

        $dernieresFactures = $abonne
            ? $abonne->factures()->latest()->take(5)->get()
            : collect();

        return view('client.dashboard', compact(
            'abonne',
            'totalFactures',
            'totalConsommations',
            'totalReclamations',
            'dernieresFactures'
        ));
    }

    /**
     * Mes factures
     */
    public function factures()
    {
        $abonne = Auth::user()->abonne;

        $factures = $abonne
            ? $abonne->factures()->with('consommation')->latest()->get()
            : collect();

        return view('client.factures', compact('factures', 'abonne'));
    }

    /**
     * Mes consommations
     */
    public function consommations()
    {
        $abonne = Auth::user()->abonne;

        $consommations = $abonne
            ? $abonne->consommations()->latest()->get()
            : collect();

        return view('client.consommations', compact('consommations', 'abonne'));
    }

    /**
     * Mes réclamations
     */
    public function reclamations()
    {
        $abonne = Auth::user()->abonne;

        $reclamations = $abonne
            ? $abonne->reclamations()->latest()->get()
            : collect();

        return view('client.reclamations', compact('reclamations', 'abonne'));
    }

    /**
     * Mon profil
     */
    public function profil()
    {
        $abonne = Auth::user()->abonne;

        return view('client.profil', compact('abonne'));
    }
}