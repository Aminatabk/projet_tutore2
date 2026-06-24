<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    protected $fillable = [
        'abonne_id',
        'objet',
        'description',
        'statut'
    ];

    public function abonne()
    {
        return $this->belongsTo(Abonne::class);
    }
}