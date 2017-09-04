<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
        return $this->hasMany('App\DetailsListe', 'foreign_key');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
