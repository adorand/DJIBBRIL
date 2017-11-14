<?php
namespace App\GraphQL\Type;
use App\Liste;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;
use GraphQL;

class ListeType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Liste',
        'model' => Liste::class
    ];

    public function fields() {
        return [
            'code'     => [ 'type' => Type::nonNull(Type::string()), 'description' => ''],
            'nom'      => [ 'type' => Type::string(), 'description' => ''],
            'client'   => [ 'type' => GraphQL::type('clients'), 'description', ''],
            'created_at'  => [ 'type' => Type::string(), 'description' => ''],
            'updated_at'  => [ 'type' => Type::string(), 'description' => ''],
            'details'  => [ 'type' => Type::listOf(GraphQL::type('detailslistes')), 'description', '']
        ];
    }
}