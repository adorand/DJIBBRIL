<?php
/**
 * Created by PhpStorm.
 * User: cedric
 * Date: 06/09/17
 * Time: 04:33
 */

namespace App\GraphQL\Query;
use App\Categorie;
use App\Produit;
use App\Surface;
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
        $query=Surface::with('categories');
        if (isset($args['code'])) {
            $query = $query->where('code', $args['code']);
        }
        return $query->get()->filter(function (Surface $surface){
            return $surface->hasRole('vendor') == true;
        })->map(function (Surface $surface)
        {
            return [
                'code' => $surface->code,
                'name' => $surface->name,
                'categories' => $surface->categories->filter(function (Categorie $categorie){
                    return $categorie->parent == null;
                })->map(function (Categorie $categorie){
                    return [
                        'code' => $categorie->code,
                        'nom' => $categorie->nom,
                        'produits' => $categorie->products,
                        'souscategories' => $categorie->souscategories,
                        'parent' => $categorie->parent
                    ];
                }),
                'logo' => $surface->logo
            ];
        });
    }
}