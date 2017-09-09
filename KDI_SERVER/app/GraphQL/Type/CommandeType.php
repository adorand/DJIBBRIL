<?php
/**
 * Created by PhpStorm.
 * User: cedric
 * Date: 06/09/17
 * Time: 01:08
 */

namespace App\GraphQL\Type;

use App\Commande;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;
use GraphQL;

class CommandeType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Commande',
        'model' => Commande::class
    ];

    public function fields() {
        return [
            'code' => [ 'type' => Type::nonNull(Type::string()), 'description' => ''],
            'etat' => [ 'type' => Type::int(), 'description' => ''],
            'client' => [ 'type' => GraphQL::type('users'), 'description', ''],
            'details' => [ 'type' => Type::listOf(GraphQL::type('detailscommandes')), 'description', '']
        ];
    }
}