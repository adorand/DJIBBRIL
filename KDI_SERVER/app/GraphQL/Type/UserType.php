<?php

namespace App\GraphQL\Type;


use App\User;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;
use GraphQL;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'User',
        'model' => User::class
    ];

    public function fields() {
        return [
            'code'        => [ 'type' => Type::nonNull(Type::string()), 'description' => ''],
            'username'    => [ 'type' => Type::string(), 'description' => ''],
            'email'       => [ 'type' => Type::string(), 'description' => ''],
            'password'    => [ 'type' => Type::string(), 'description', ''],
            'image'       => [ 'type' => Type::string(), 'description' => ''],
            'created_at'  => [ 'type' => Type::string(), 'description' => ''],
            'updated_at'  => [ 'type' => Type::string(), 'description' => ''],
            'roles'       => [ 'type' => Type::listOf(GraphQL::type('roles')), 'description', ''],
        ];
    }
}