<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Categorie;
class Surface extends Model
{


    protected $primaryKey = 'code';

    public $incrementing = false;


    public function user() {
        return $this->belongsTo(User::class,'user_code','code');
    }

    public function categories() {
        return $this->hasMany('\App\Categorie', 'surface_code','user_code');
    }
}
