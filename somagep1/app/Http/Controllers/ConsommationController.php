<?php

namespace App\Http\Controllers;

use App\Models\Consommation;
use App\Models\Abonne;
use Illuminate\Http\Request;

class ConsommationController extends Controller
{
    public function index()
    {
        $consommations = Consommation::with('abonne')->get();

        return view(
            'consommations.index',
            compact('consommations')
        );
    }

    public function create()
    {
        $abonnes = Abonne::all();

        return view(
            'consommations.create',
            compact('abonnes')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'abonne_id' => 'required',
            'ancienne_valeur' => 'required|numeric',
            'nouvelle_valeur' => 'required|numeric|gte:ancienne_valeur'
        ]);

        Consommation::create([
            'abonne_id' => $request->abonne_id,
            'ancienne_valeur' => $request->ancienne_valeur,
            'nouvelle_valeur' => $request->nouvelle_valeur,
            'consommation' => $request->nouvelle_valeur - $request->ancienne_valeur
        ]);

        return redirect()
            ->route('consommations.index')
            ->with('success', 'Consommation enregistrée avec succès');
    }

    public function show($id)
    {
        $consommation = Consommation::with('abonne')
            ->findOrFail($id);

        return view(
            'consommations.show',
            compact('consommation')
        );
    }

    public function edit($id)
    {
        $consommation = Consommation::findOrFail($id);
        $abonnes = Abonne::all();

        return view(
            'consommations.edit',
            compact(
                'consommation',
                'abonnes'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'abonne_id' => 'required',
            'ancienne_valeur' => 'required|numeric',
            'nouvelle_valeur' => 'required|numeric|gte:ancienne_valeur'
        ]);

        $consommation = Consommation::findOrFail($id);

        $consommation->update([
            'abonne_id' => $request->abonne_id,
            'ancienne_valeur' => $request->ancienne_valeur,
            'nouvelle_valeur' => $request->nouvelle_valeur,
            'consommation' => $request->nouvelle_valeur - $request->ancienne_valeur
        ]);

        return redirect()
            ->route('consommations.index')
            ->with('success', 'Consommation modifiée avec succès');
    }

    public function destroy($id)
    {
        Consommation::destroy($id);

        return redirect()
            ->route('consommations.index')
            ->with('success', 'Consommation supprimée avec succès');
    }
}