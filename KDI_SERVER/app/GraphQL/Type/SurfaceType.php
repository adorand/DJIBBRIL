<?php
/**
 * Created by PhpStorm.
 * User: cedric
 * Date: 06/09/17
 * Time: 00:54
 */

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
            'code' => [ 'type' => Type::nonNull(Type::string()), 'description' => ''],
            'name' => [ 'type' => Type::string(), 'description' => ''],
            'logo' => [ 'type' => Type::string(), 'description', ''],
            'categories' => [ 'type' => Type::listOf(GraphQL::type('categories')), 'description', '']
        ];
    }
}