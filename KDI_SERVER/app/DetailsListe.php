<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Liste;
use App\Produit;

class DetailsListe extends Model
{
    public function produit() {
        return $this->hasOne(Produit::class, 'code', 'produit_code');
    }

    public function liste() {
        return $this->hasOne(Liste::class, 'code', 'liste_code');
    }
}
