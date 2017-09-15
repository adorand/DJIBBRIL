<?php
namespace App\GraphQL\Type;
use App\DetailsCommande;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;
use GraphQL;

class DetailsCommandeType extends GraphQLType
{
    protected $attributes = [
        'name' => 'DetailsCommande',
        'model' => DetailsCommande::class
    ];

    public function fields() {
        return [
            'quantite'  => [ 'type' => Type::int(), 'description' => ''],
            'produit'   => [ 'type' => GraphQL::type('produits'), 'description', ''],
            'commande'  => [ 'type' => GraphQL::type('commandes'), 'description', '']
        ];
    }
}