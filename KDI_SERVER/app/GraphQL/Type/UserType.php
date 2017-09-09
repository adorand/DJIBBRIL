<?php
/**
 * Created by PhpStorm.
 * User: cedric
 * Date: 06/09/17
 * Time: 01:08
 */

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
            'code' => [ 'type' => Type::nonNull(Type::string()), 'description' => ''],
            'username' => [ 'type' => Type::string(), 'description' => ''],
            'telephone' => [ 'type' => Type::string(), 'description' => ''],
            'email' => [ 'type' => Type::string(), 'description' => ''],
            'commandes' => [ 'type' => Type::listOf(GraphQL::type('commandes')), 'description', ''],
            'listes' => [ 'type' => Type::listOf(GraphQL::type('listes')), 'description', '']
        ];
    }
}