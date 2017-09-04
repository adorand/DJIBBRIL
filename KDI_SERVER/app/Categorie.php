<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{

    protected $primaryKey = 'code';
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    public function product() {
        return $this->hasMany('App\Produit', 'foreign_key');
    }
}
