<?php
/**
 * Created by PhpStorm.
 * User: cedric
 * Date: 06/09/17
 * Time: 01:08
 */

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
            'code' => [ 'type' => Type::nonNull(Type::string()), 'description' => ''],
            'libelle' => [ 'type' => Type::string(), 'description' => ''],
            'etat' => [ 'type' => Type::int(), 'description' => ''],
            'client' => [ 'type' => GraphQL::type('users'), 'description', ''],
            'details' => [ 'type' => Type::listOf(GraphQL::type('detailslistes')), 'description', '']
        ];
    }
}