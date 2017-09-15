<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Surface extends Model
{


    protected $primaryKey = 'code';

    public $incrementing = false;


    public function user() {
        return $this->belongsTo('\App\User','user_code','code');
    }

    public function hasuser()
    {
        return $this->hasOne('\App\User', 'code','user_code');
    }
}
