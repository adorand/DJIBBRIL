<?php

namespace App\Authority;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $incrementing=false;
    protected $fillable = [ 'id', 'name' ];
}
