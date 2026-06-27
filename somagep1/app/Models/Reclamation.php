<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    protected $fillable = [
        'abonne_id',
        'objet',
        'description',
        'statut',
        'date_reclamation'
    ];

    public function abonne()
    {
        return $this->belongsTo(Abonne::class);
    }
}