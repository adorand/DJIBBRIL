<?php

namespace App\GraphQL\Query;
use App\Commande;
use App\DetailsCommande;
use App\Outils;
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
        $query=Commande::with('details');
        if (isset($args['code'])) {
            $query = $query->where('code', $args['code']);
        }
        return $query->get()->map(function (Commande $commande)
        {
            return [
                'code'       => $commande->code,
                'etat'       => $commande->etat,
                'client'     => $commande->client,
                'details'    => $commande->details->map(function (DetailsCommande $detailsCommande)
                {
                    return [
                        'id'         => $detailsCommande->id,
                        'produit'    => $detailsCommande->produit,
                        'quantite'   => $detailsCommande->quantite,
                        'commande'   => $detailsCommande->commande,
                        'created_at' => $detailsCommande->created_at->format(Outils::formatdate()),
                        'updated_at' => $detailsCommande->updated_at->format(Outils::formatdate()),
                    ];
                }),
                'created_at' => $commande->created_at->format(Outils::formatdate()),
                'updated_at' => $commande->updated_at->format(Outils::formatdate()),
            ];
        });
    }
}