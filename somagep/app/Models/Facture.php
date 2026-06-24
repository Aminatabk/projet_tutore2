<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    protected $fillable = [
        'abonne_id',
        'numero_facture',
        'montant',
        'date_facture',
        'date_echeance',
        'statut'
    ];

    public function abonne()
    {
        return $this->belongsTo(Abonne::class);
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class);
    }
}