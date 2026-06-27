<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Consommation;
use App\Models\Reclamation;

class ClientController extends Controller
{
    /**
     * Mes factures
     */
    public function factures()
    {
        $factures = Facture::with('abonne')->latest()->get();

        return view('client.factures', compact('factures'));
    }

    /**
     * Mes consommations
     */
    public function consommations()
    {
        $consommations = Consommation::with('abonne')->latest()->get();

        return view('client.consommations', compact('consommations'));
    }

    /**
     * Mes réclamations
     */
    public function reclamations()
    {
        $reclamations = Reclamation::with('abonne')->latest()->get();

        return view('client.reclamations', compact('reclamations'));
    }

    /**
     * Mon profil
     */
    public function profil()
    {
        return view('client.profil');
    }
}
