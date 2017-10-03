<?php
namespace App\GraphQL\Type;
use App\Categorie;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;
use GraphQL;

class SouscategorieType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Souscategorie',
        'model' => Categorie::class
    ];

    public function fields() {
        return [
            'code'         => [ 'type' => Type::nonNull(Type::string()), 'description' => ''],
            'nom'          => [ 'type' => Type::string(), 'description' => ''],
            'description'  => [ 'type' => Type::string(), 'description' => ''],
            'created_at'   => [ 'type' => Type::string(), 'description' => ''],
            'updated_at'   => [ 'type' => Type::string(), 'description' => ''],
            'parent'       => [ 'type' => GraphQL::type('categories'), 'description', ''],
            'surface'      => [ 'type' => GraphQL::type('surfaces'), 'description', ''],
            'produits'     => [ 'type' => Type::listOf(GraphQL::type('produits')), 'description', '']
        ];
    }
}