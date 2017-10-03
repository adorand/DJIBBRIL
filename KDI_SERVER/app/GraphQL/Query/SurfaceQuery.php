<?php

namespace App\GraphQL\Query;
use App\Categorie;
use App\Surface;
use App\Produit;
use App\Outils;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;

class SurfaceQuery extends Query
{
    protected $attributes = [
        'name' => 'Surface query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('surfaces'));
    }

    public function args()
    {
        return [
            'code' => ['name' => 'code', 'type' => Type::string()],
        ];
    }

    public function resolve($root, $args)
    {
        $query=Surface::all();
        if (isset($args['code'])) {
            $query = Surface::where('code', $args['code'])->get();
        }

        return $query->map(function (Surface $surface)
        {
            return [
                'code'        => $surface->code,
                'nom'         => $surface->nom,
                'image'       => $surface->image,
                'created_at'  => $surface->created_at->format(Outils::formatdate()),
                'updated_at'  => $surface->updated_at->format(Outils::formatdate()),
                'user'        => $surface->user,
                'categories'   => $surface->categories->map(function (Categorie $ctg){
                    return [
                        'code' => $ctg->code,
                        'nom' => $ctg->nom,
                        'description' => $ctg->description,
                        'surface_code' => $ctg->surface_code,
                        'created_at' => $ctg->created_at->format(Outils::formatdate()),
                        'updated_at' => $ctg->updated_at->format(Outils::formatdate()),
                        'souscategories' => $ctg->souscategories->map(function (Categorie $ssctg){
                            return [
                                'code'         => $ssctg->code,
                                'nom'          => $ssctg->nom,
                                'description'  => $ssctg->description,
                                'created_at'   => $ssctg->created_at->format(Outils::formatdate()),
                                'updated_at'   => $ssctg->updated_at->format(Outils::formatdate()),
                                'parent'       => $ssctg->parent,
                                'produits'     => $ssctg->produits->map(function (Produit $prod){
                                    return [
                                        'code'         => $prod->code,
                                        'designation'  => $prod->designation,
                                        'description'  => $prod->description,
                                        'created_at'   => $prod->created_at->format(Outils::formatdate()),
                                        'updated_at'   => $prod->updated_at->format(Outils::formatdate()),
                                        'quantite'     => $prod->quantite,
                                        'prix'         => $prod->prix,
                                        'image'        => $prod->image,
                                        'souscategorie'   => $prod->categorie
                                    ];
                                })
                            ];
                        })
                    ];
                })
            ];
        });
    }
}