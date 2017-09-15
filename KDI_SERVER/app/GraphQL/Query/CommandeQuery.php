<?php

namespace App\GraphQL\Query;
use App\Commande;
use App\DetailsCommande;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;

class CommandeQuery extends Query
{
    protected $attributes = [
        'name' => 'Commande query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('commandes'));
    }

    public function args()
    {
        return [
            'code' => ['name' => 'code', 'type' => Type::string()],
        ];
    }

    public function resolve($root, $args)
    {
        $query=Commande::with('produits');
        if (isset($args['code'])) {
            $query = $query->where('code', $args['code']);
        }
        return $query->get()->map(function (Commande $commande)
        {
            return [
                'code'    => $commande->code,
                'etat'    => $commande->etat,
                'membre'  => $commande->membre,
                'details' => $commande->produits
            ];
        });
    }
}