<?php
namespace App\GraphQL\Query;

use App\DetailsListe;
use App\Liste;
use App\Outils;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;

class ListeQuery extends Query
{
    protected $attributes = [
        'name' => 'Liste query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('listes'));
    }

    public function args()
    {
        return [
            'code'       => ['name' => 'code', 'type' => Type::string()],
            'client_code' => ['name' => 'client_code', 'type' => Type::string()],
        ];
    }

    public function resolve($root, $args)
    {
        $query=Liste::with('details');
        if (isset($args['code'])) {
            $query = $query->where('code', $args['code']);
        }
        if (isset($args['client_code'])) {
            $query = $query->where('client_code', $args['client_code']);
        }
        return $query->get()->map(function (Liste $liste)
        {
            return [
                'code'       => $liste->code,
                'nom'        => $liste->nom,
                'client'     => $liste->client,
                'details'    => $liste->details->map(function (DetailsListe $detailsListe)
                {
                    return [
                        'id'         => $detailsListe->id,
                        'produit'    => $detailsListe->produit,
                        'quantite'   => $detailsListe->quantite,
                        'liste'      => $detailsListe->liste,
                        'liste_code' => $detailsListe->liste_code,
                        'created_at' => $detailsListe->created_at->format(Outils::formatdate()),
                        'updated_at' => $detailsListe->updated_at->format(Outils::formatdate()),
                    ];
                }),
                'created_at' => $liste->created_at->format(Outils::formatdate()),
                'updated_at' => $liste->updated_at->format(Outils::formatdate()),
            ];
        });
    }
}