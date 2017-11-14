<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Liste;
use App\Produit;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailsListe extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function produit()
    {
        return $this->hasOne(Produit::class, 'code', 'produit_code');
    }

    public function liste()
    {
        return $this->hasOne(Liste::class, 'code', 'liste_code');
    }
}
