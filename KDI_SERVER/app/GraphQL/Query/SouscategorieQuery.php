<?php

namespace App\GraphQL\Query;


use App\Categorie;
use App\GraphQL\Serializers\SouscategorieSerializer;
use App\Produit;
use App\Outils;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;

class SouscategorieQuery extends Query
{
    protected $attributes = [
        'name' => 'Sous category query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('categories'));
    }

    public function args()
    {
        return [
            'code'      => ['name' => 'code', 'type' => Type::string()],
            'nom'       => ['name' => 'nom', 'type' => Type::string()],
            'produits'  => ['name' => 'produits', 'type' => Type::listOf(GraphQL::type('produits'))],
            'categorie' => ['name' => 'souscategories', 'type' => Type::listOf(GraphQL::type('categories'))]
        ];
    }

    public function resolve($root, $args)
    {
        $query=Categorie::with('products');
        if (isset($args['code'])) {
            $query = $query->where('code', $args['code']);
        }
        return $query->get()->filter(function (Categorie $ctg){
            return $ctg->parent != null;
        })->map(function (Categorie $ssctg)
        {
            return [
                'code'         => $ssctg->code,
                'nom'          => $ssctg->nom,
                'description'  => $ssctg->description,
                'created_at'   => $ssctg->created_at->format(Outils::formatdate()),
                'updated_at'   => $ssctg->updated_at->format(Outils::formatdate()),
                'parent'       => $ssctg->parent,
                'produits'     => $ssctg->produits->map(function (Produit $prod){
                    return [
                        'code'        => $prod->code,
                        'designation' => $prod->designation,
                        'description' => $prod->description,
                        'created_at'  => $prod->created_at->format(Outils::formatdate()),
                        'updated_at'  => $prod->updated_at->format(Outils::formatdate()),
                        'quantite'    => $prod->quantite,
                        'prix'        => $prod->prix,
                        'image'       => $prod->image,
                        'souscategorie'   => $prod->categorie
                    ];
                })
            ];
        });
    }
}