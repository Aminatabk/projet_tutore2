<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
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