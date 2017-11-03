<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DetailsCommande;
use App\Client;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commande extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $primaryKey = 'code';

    public $incrementing = false;

    public function details()
    {
        return $this->hasMany(DetailsCommande::class, 'commande_code', 'code');
    }

    public function client()
    {
        return $this->hasOne(Client::class, 'code', 'client_code');
    }

}
