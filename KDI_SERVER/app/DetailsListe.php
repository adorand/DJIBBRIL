<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailsListe extends Model
{
    public function produit() {
        return $this->belongsTo('App\Produit');
    }

    public function liste() {
        return $this->belongsTo('App\Liste');
    }
}
