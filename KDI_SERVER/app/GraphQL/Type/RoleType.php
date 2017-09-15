<?php

namespace App\GraphQL\Type;


use App\Authority\Role;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;
use GraphQL;

class RoleType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Role',
        'model' => Role::class
    ];

    public function fields() {
        return [
            'id'          => [ 'type' => Type::id(), 'description' => ''],
            'name'        => [ 'type' => Type::string(), 'description' => ''],
            'created_at'  => [ 'type' => Type::string(), 'description' => ''],
            'updated_at'  => [ 'type' => Type::string(), 'description' => ''],
            'users'       => [ 'type' => GraphQL::type('users'), 'description' => '']

        ];
    }
}