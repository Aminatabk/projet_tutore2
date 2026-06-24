<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consommation extends Model
{
    protected $fillable = [
        'abonne_id',
        'ancienne_valeur',
        'nouvelle_valeur',
        'consommation',
        'date_releve'
    ];

    public function abonne()
    {
        return $this->belongsTo(Abonne::class);
    }
}