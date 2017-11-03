<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produit extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $primaryKey = 'code';

    public $incrementing = false;

    public function categorie() {
        return $this->belongsTo(Categorie::class);
    }

    public function commandes() {
        return $this->hasMany('App\DetailsCommande', 'produit_code', 'code');
    }

    public function listes() {
        return $this->hasMany('App\DetailsListe', 'produit_code', 'code');
    }
}
