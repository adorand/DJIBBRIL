<?php

namespace App\GraphQL\Query;


use App\Outils;
use App\Authority\Role;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;

class RoleQuery extends Query
{
    protected $attributes = [
        'name' => 'Role query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('roles'));
    }

    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::id()],
        ];
    }

    public function resolve($root, $args)
    {

        $query=Role::all();
        if (isset($args['id'])) {
            $query = Role::where('id', $args['id'])->get();
        }
        return $query->map(function (Role $role){
            return [
                'id'          => $role->id,
                'name'        => $role->name,
                'created_at'  => $role->created_at->format(Outils::formatdate()),
                'updated_at'  => $role->updated_at->format(Outils::formatdate())
            ];
        });
    }
}