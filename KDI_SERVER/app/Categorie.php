<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Produit;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categorie extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $primaryKey = 'code';

    public $incrementing = false;

    public function produits()
    {
        return $this->hasMany(Produit::class, 'categorie_code','code');
    }


    public function souscategories()
    {
        return $this->hasMany(Categorie::class, 'code_parent','code');
    }


    public function parent()
    {
        return $this->hasOne(Categorie::class, 'code', 'code_parent');
    }


    public function surface() {
        return $this->hasOne(Surface::class, 'user_code', 'surface_code');
    }

}
