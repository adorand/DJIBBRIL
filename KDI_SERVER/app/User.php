<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $primaryKey = 'code';
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    public function commandes() {
        return $this->hasMany('App\Commande', 'foreign_key');
    }
    public function listes() {
        return $this->hasMany('App\Liste', 'foreign_key');
    }
    public function paiements() {
        return $this->hasMany('App\Paiement', 'foreign_key');
    }
}
