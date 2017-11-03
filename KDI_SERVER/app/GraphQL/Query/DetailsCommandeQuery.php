<?php

namespace App\GraphQL\Query;
use App\DetailsCommande;
use App\Outils;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;

class DetailsCommandeQuery extends Query
{
    protected $attributes = [
        'name' => 'DetailsCommande query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('detailscommandes'));
    }

    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::id()],
        ];
    }

    public function resolve($root, $args)
    {
        $query=DetailsCommande::with('produit');
        if (isset($args['id'])) {
            $query = $query->where('id', $args['id']);
        }
        return $query->get()->map(function (DetailsCommande $detailsCommande)
        {
            return [
                'id'         => $detailsCommande->id,
                'produit'    => $detailsCommande->produit,
                'quantite'   => $detailsCommande->quantite,
                'commande'   => $detailsCommande->commande,
                'created_at' => $detailsCommande->created_at->format(Outils::formatdate()),
                'updated_at' => $detailsCommande->updated_at->format(Outils::formatdate()),
            ];
        });
    }
}