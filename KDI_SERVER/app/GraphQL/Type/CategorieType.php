<?php
/**
 * Created by PhpStorm.
 * User: cedric
 * Date: 06/09/17
 * Time: 01:02
 */

namespace App\GraphQL\Type;
use App\Categorie;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;
use GraphQL;

class CategorieType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Categorie',
        'model' => Categorie::class
    ];

    public function fields() {
        return [
            'code' => [ 'type' => Type::nonNull(Type::string()), 'description' => ''],
            'nom' => [ 'type' => Type::string(), 'description' => ''],
            'description' => [ 'type' => Type::string(), 'description' => ''],
            'parent' => [ 'type' => GraphQL::type('categories'), 'description', ''],
            'surface' => [ 'type' => GraphQL::type('surfaces'), 'description', ''],
            'produits' => [ 'type' => Type::listOf(GraphQL::type('produits')), 'description', ''],
            'souscategories' => [ 'type' => Type::listOf(GraphQL::type('categories')), 'description', '']
        ];
    }
}