<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Commande;
use App\Produit;

class DetailsCommande extends Model
{
    public function produit() {
        return $this->hasOne(Produit::class, 'code', 'produit_code');
    }

    public function commande() {
        return $this->hasOne(Commande::class, 'code', 'commande_code');
    }
}
