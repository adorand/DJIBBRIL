<?php
namespace App\GraphQL\Type;


use App\Client;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;
use GraphQL;

class ClientType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Client',
        'model' => Client::class
    ];

    public function fields() {
        return
        [
            'code'        => [ 'type' => Type::nonNull(Type::string()), 'description' => ''],
            'nom'         => [ 'type' => Type::string(), 'description' => ''],
            'telephone'   => [ 'type' => Type::string(), 'description' => ''],
            'email'       => [ 'type' => Type::string(), 'description' => ''],
            'password'    => [ 'type' => Type::string(), 'description' => ''],
            'image'       => [ 'type' => Type::string(), 'description' => ''],
            'created_at'  => [ 'type' => Type::string(), 'description' => ''],
            'updated_at'  => [ 'type' => Type::string(), 'description' => ''],
            'panier'      => [ 'type' => GraphQL::type('commandes'), 'description', ''],
            'commandes'   => [ 'type' => Type::listOf(GraphQL::type('commandes')), 'description', ''],
            'listes'      => [ 'type' => Type::listOf(GraphQL::type('listes')), 'description', '']
        ];
    }
}