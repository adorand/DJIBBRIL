<?php

namespace App\GraphQL\Type;
use App\Produit;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;
use GraphQL;


class ProduitType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Produit',
        'model' => Produit::class
    ];

    public function fields() {
        return [
            'code'           => [ 'type' => Type::nonNull(Type::string()), 'description' => ''],
            'designation'    => [ 'type' => Type::string(), 'description' => ''],
            'description'    => [ 'type' => Type::string(), 'description', ''],
            'created_at'     => [ 'type' => Type::string(), 'description' => ''],
            'updated_at'     => [ 'type' => Type::string(), 'description' => ''],
            'quantite'       => [ 'type' => Type::float(), 'description' => ''],
            'prix'           => [ 'type' => Type::float(), 'description' => ''],
            'image'          => [ 'type' => Type::string(), 'description' => ''],
            'categorie_code'       => [ 'type' => Type::string(), 'description' => ''],
            'souscategorie'  => [ 'type' => GraphQL::type('categories'), 'description' => '']
        ];
    }
}