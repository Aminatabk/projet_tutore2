<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    protected $fillable = [
        'numero_facture',
        'abonne_id',
        'consommation_id',
        'montant',
        'statut',
        'date_emission',
        'date_echeance'
    ];

    public function abonne()
    {
        return $this->belongsTo(Abonne::class);
    }

    public function consommation()
    {
        return $this->belongsTo(Consommation::class);
    }
}