<?php

namespace App\GraphQL\Query;


use App\Outils;
use App\User;
use App\Authority\Role;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;

class UserQuery extends Query
{
    protected $attributes = [
        'name' => 'User query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('users'));
    }

    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::id()],
        ];
    }

    public function resolve($root, $args)
    {

        $query=User::all();
        if (isset($args['code'])) {
            $query = User::where('code', $args['code'])->get();
        }
        return $query->map(function (User $user){
            return [
                'code'        => $user->code,
                'username'    => $user->username,
                'email'       => $user->email,
                'password'    => $user->password,
                'image'       => $user->image,
                'created_at'  => $user->created_at->format(Outils::formatdate()),
                'updated_at'  => $user->updated_at->format(Outils::formatdate()),
                'roles'  => $user->roles->map(function (Role $role){
                    return [
                        'id'          => $role->id,
                        'name'        => $role->name,
                        'created_at'  => $role->created_at->format(Outils::formatdate()),
                        'updated_at'  => $role->updated_at->format(Outils::formatdate())
                    ];
                }),
            ];
        });
    }
}