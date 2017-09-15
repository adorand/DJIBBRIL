<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DetailsCommande;
use App\User;

class Commande extends Model
{

    protected $primaryKey = 'code';
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    public function produits() {
        return $this->hasMany(DetailsCommande::class, 'commande_code', 'code');
    }

    public function user() {
        return $this->hasOne(User::class, 'code', 'membre_code');
    }

}
