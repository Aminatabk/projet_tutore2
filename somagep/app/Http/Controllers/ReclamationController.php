<?php

namespace App\Http\Controllers;

use App\Models\Reclamation;
use Illuminate\Http\Request;

class ReclamationController extends Controller
{
    public function store(Request $request)
    {
        Reclamation::create([
            'abonne_id' => $request->abonne_id,
            'objet' => $request->objet,
            'description' => $request->description,
            'statut' => 'En attente'
        ]);

        return back();
    }

    public function traiter($id)
    {
        Reclamation::findOrFail($id)
            ->update([
                'statut' => 'Traitee'
            ]);

        return back();
    }
}