<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Categorie;
use Illuminate\Database\Eloquent\SoftDeletes;

class Surface extends Model
{
    use SoftDeletes;
    protected $dates=['deleted_at'];

    protected $primaryKey = 'code';

    public $incrementing = false;


    public function user() {
        return $this->belongsTo(User::class,'user_code','code');
    }

    public function categories() {
        return $this->hasMany('\App\Categorie', 'surface_code','user_code');
    }
}
