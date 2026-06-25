<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    protected $fillable = [
        'abonne_id',
        'consommation_id',
        'montant',
        'statut'
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