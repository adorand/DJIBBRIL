<?php

namespace App\GraphQL\Query;


use App\Categorie;
use App\GraphQL\Serializers\ProduitSerializer;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\Controller;
use App\Produit;
use App\Outils;
use App\Surface;
use App\User;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;
use Illuminate\Support\Facades\Auth;

class CategorieQuery extends Query
{

    protected $attributes = [
        'name' => 'Category query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('categories'));
    }

    public function args()
    {
        return [
            'code'           => ['name' => 'code', 'type' => Type::string()],
            'nom'            => ['name' => 'nom', 'type' => Type::string()],
            'surface_code'   => ['name' => 'surface_code', 'type' => Type::string()],
            'produits'       => ['name' => 'produits', 'type' => Type::listOf(GraphQL::type('produits'))],
            'souscategories' => ['name' => 'souscategories', 'type' => Type::listOf(GraphQL::type('categories'))]
        ];
    }

    public function resolve($root, $args)
    {

        $query=Categorie::with('products');
        if (isset($args['code'])) {
            $query = $query->where('code', $args['code']);
        }
        if (isset($args['surface_code'])) {
            //On récupère les cateogires propres à chaque surface et ceux ajoutés de manière globale par l'adaministrateur
            $query = $query->where('surface_code', $args['surface_code'])->orWhereNotIn('surface_code',Surface::all('user_code'));
        }
        return $query->get()->filter(function (Categorie $ctg){
            return $ctg->parent == null;
        })->map(function (Categorie $ctg)
        {
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
        });
    }
}