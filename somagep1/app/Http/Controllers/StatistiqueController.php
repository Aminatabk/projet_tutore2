<?php

namespace App\Http\Controllers;

use App\Models\Abonne;
use App\Models\Consommation;
use App\Models\Facture;
use App\Models\Paiement;
use App\Models\Reclamation;

class StatistiqueController extends Controller
{
    /**
     * Afficher les statistiques et rapports (cas d'utilisation "Agent de gestion"
     * et "Consulter les rapports" pour l'administrateur)
     */
    public function index()
    {
        $totalAbonnes = Abonne::count();
        $totalConsommations = Consommation::count();

        $totalFactures = Facture::count();
        $facturesPayees = Facture::where('statut', 'Payée')->count();
        $facturesNonPayees = $totalFactures - $facturesPayees;

        $montantTotalFacture = Facture::sum('montant');
        $montantTotalPaye = Facture::where('statut', 'Payée')->sum('montant');
        $montantTotalImpaye = $montantTotalFacture - $montantTotalPaye;

        $reclamationsParStatut = Reclamation::selectRaw('statut, count(*) as total')
            ->groupBy('statut')
            ->pluck('total', 'statut');

        $totalPaiements = Paiement::count();

        return view('statistiques.index', compact(
            'totalAbonnes',
            'totalConsommations',
            'totalFactures',
            'facturesPayees',
            'facturesNonPayees',
            'montantTotalFacture',
            'montantTotalPaye',
            'montantTotalImpaye',
            'reclamationsParStatut',
            'totalPaiements'
        ));
    }
}