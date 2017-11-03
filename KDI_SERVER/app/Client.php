<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Liste;
use App\Commande;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $primaryKey = 'code';

    public $incrementing = false;

    public function commandes()
    {
        return $this->hasMany(Commande::class, 'client_code', 'code');
    }

    public function listes()
    {
        return $this->hasMany(Liste::class, 'client_code', 'code');
    }
}
