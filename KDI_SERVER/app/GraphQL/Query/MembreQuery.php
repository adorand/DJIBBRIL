<?php

namespace App\GraphQL\Query;

use App\Membre;
use App\Outils;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;

class MembreQuery extends Query
{
    protected $attributes = [
        'name' => 'Membre query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('membres'));
    }

    public function args()
    {
        return [
            'code' => ['name' => 'code', 'type' => Type::string()],
        ];
    }

    public function resolve($root, $args)
    {
        $query=Membre::with('commandes')->with('listes');
        if (isset($args['code'])) {
            $query = $query->where('code', $args['code']);
        }
        return $query->get()->map(function (Membre $membre)
        {
            return [
                'code'       => $membre->code,
                'nom'        => $membre->nom,
                'telephone'  => $membre->telephone,
                'email'      => $membre->email,
                'password'   => $membre->password,
                'image'      => $membre->image,
                'created_at' => $membre->created_at->format(Outils::formatdate()),
                'updated_at' => $membre->updated_at->format(Outils::formatdate()),
                'commandes'  => $membre->commandes,
                'listes'     => $membre->listes,
            ];
        });
    }
}