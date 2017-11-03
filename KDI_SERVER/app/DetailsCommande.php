<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Commande;
use App\Produit;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailsCommande extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function produit()
    {
        return $this->hasOne(Produit::class, 'code', 'produit_code');
    }

    public function commande()
    {
        return $this->hasOne(Commande::class, 'code', 'commande_code');
    }
}
