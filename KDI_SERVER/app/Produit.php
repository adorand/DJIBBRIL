<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{

    protected $primaryKey = 'code';
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    public function categorie() {
        return $this->belongsTo('App\Categorie');
    }

    public function commandes() {
        return $this->hasMany('App\DetailsCommande', 'foreign_key');
    }

    public function listes() {
        return $this->hasMany('App\DetailsListe', 'foreign_key');
    }
}
