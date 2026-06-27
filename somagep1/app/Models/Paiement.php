<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    protected $fillable = [
        'facture_id',
        'montant',
        'mode',
        'reference_paiement',
        'statut'
    ];

    public function facture()
    {
        return $this->belongsTo(Facture::class);
    }
}