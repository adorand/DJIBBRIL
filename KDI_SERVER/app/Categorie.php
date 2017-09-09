<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Produit;

class Categorie extends Model
{

    protected $primaryKey = 'code';
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    public function products() {
        return $this->hasMany(Produit::class, 'categorie_code','code');
    }

    public function souscategories() {
        return $this->hasMany(Categorie::class, 'code_parent','code');
    }

    public function parent() {
        return $this->hasOne(Categorie::class, 'code', 'code_parent');
    }

    public function surface() {
        return $this->belongsTo('App\Surface');
    }

}
