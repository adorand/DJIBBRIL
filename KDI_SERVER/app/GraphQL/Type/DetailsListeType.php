<?php
namespace App\GraphQL\Type;
use App\DetailsListe;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;
use GraphQL;

class DetailsListeType extends GraphQLType
{
    protected $attributes = [
        'name' => 'DetailsListe',
        'model' => DetailsListe::class
    ];

    public function fields() {
        return [
            'quantite'  => [ 'type' => Type::string(), 'description' => ''],
            'produit'   => [ 'type' => GraphQL::type('produits'), 'description', ''],
            'liste'     => [ 'type' => GraphQL::type('listes'), 'description', '']
        ];
    }
}