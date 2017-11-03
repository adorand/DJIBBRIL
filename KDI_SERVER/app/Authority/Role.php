<?php

namespace App\Authority;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
    protected $dates=['deleted_at'];
    public $incrementing=false;
    protected $fillable = [ 'id', 'name' ];
}
