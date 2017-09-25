<?php

namespace App\GraphQL\Type;
use App\Surface;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;
use GraphQL;

class SurfaceType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Surface',
        'model' => Surface::class
    ];

    public function fields() {
        return [
            'code'        => [ 'type' => Type::nonNull(Type::string()), 'description' => ''],
            'nom'         => [ 'type' => Type::string(), 'description' => ''],
            'image'       => [ 'type' => Type::string(), 'description', ''],
            'created_at'  => [ 'type' => Type::string(), 'description' => ''],
            'updated_at'  => [ 'type' => Type::string(), 'description' => ''],
            'user'        => [ 'type' => GraphQL::type('users'), 'description' => ''],
            'categories'  => [ 'type' => Type::listOf(GraphQL::type('categories')), 'description', '']


        ];
    }
}