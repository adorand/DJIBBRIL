<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DetailsListe;
use App\User;

class Liste extends Model
{
    protected $primaryKey = 'code';
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    public function produits() {
        return $this->hasMany(DetailsListe::class, 'liste_code', 'code');
    }

    public function user() {
        return $this->hasOne(User::class, 'code', 'client_code');
    }
}
