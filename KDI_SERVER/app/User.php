<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;
    protected $dates=['deleted_at'];

    use Notifiable;

    protected $primaryKey = 'code';

    public $incrementing = false;

    protected $fillable = [
        'code','username', 'email', 'password', 'image',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Authority\Role::class)->withTimestamps();
    }

    public function permissions()
    {
        return $this->hasMany(Authority\Permission::class);
    }

    public function hasRole($key)
    {
        $hasRole = false;
        foreach ($this->roles as $role)
        {
            if ($role->name === $key) {
                $hasRole = true;
                break;
            }
        }
        return $hasRole;
    }
}
