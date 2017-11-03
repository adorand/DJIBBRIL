<?php
namespace App\GraphQL\Query;

use App\DetailsListe;
use App\Liste;
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
            'code' => ['name' => 'code', 'type' => Type::string()],
        ];
    }

    public function resolve($root, $args)
    {
        $query=Liste::with('produits');
        if (isset($args['code'])) {
            $query = $query->where('code', $args['code']);
        }
        return $query->get()->map(function (Liste $liste)
        {
            return [
                'code'     => $liste->code,
                'libelle'  => $liste->libelle,
                'etat'     => $liste->etat,
                'client'   => $liste->client,
                'details'  => $liste->produits
            ];
        });
    }
}