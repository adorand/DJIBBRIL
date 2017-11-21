<?php

namespace App\GraphQL\Query;
use App\DetailsListe;
use App\Outils;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;

class DetailsListeQuery extends Query
{
    protected $attributes = [
        'name' => 'DetailsListe query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('detailslistes'));
    }

    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::id()],
        ];
    }

    public function resolve($root, $args)
    {
        $query=DetailsListe::with('produit');
        if (isset($args['id'])) {
            $query = $query->where('id', $args['id']);
        }
        return $query->get()->map(function (DetailsListe $detailsListe)
        {
            return [
                'id'         => $detailsListe->id,
                'produit'    => $detailsListe->produit,
                'quantite'   => $detailsListe->quantite,
                'liste_code' => $detailsListe->liste_code,
                'liste'      => $detailsListe->liste,
                'created_at' => $detailsListe->created_at->format(Outils::formatdate()),
                'updated_at' => $detailsListe->updated_at->format(Outils::formatdate()),
            ];
        });
    }
}