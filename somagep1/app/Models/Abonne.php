<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Abonne extends Model
{
    protected $fillable = [
        'nom',
        'prenom',
        'adresse',
        'telephone',
        'email',
        'user_id',
    ];

    public function consommations()
    {
        return $this->hasMany(Consommation::class);
    }

    public function factures()
    {
        return $this->hasMany(Facture::class);
    }

    public function reclamations()
    {
        return $this->hasMany(Reclamation::class);
    }

    /**
     * Le compte utilisateur lié à cet abonné (rôle "client")
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}