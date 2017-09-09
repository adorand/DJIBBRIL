<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Liste;
use App\Commande;

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
        return $this->hasMany(Commande::class, 'client_code', 'code');
    }
    public function listes() {
        return $this->hasMany(Liste::class, 'client_code', 'code');
    }
}
