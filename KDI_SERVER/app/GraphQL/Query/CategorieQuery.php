<?php
/**
 * Created by PhpStorm.
 * User: cedric
 * Date: 06/09/17
 * Time: 03:12
 */

namespace App\GraphQL\Query;


use App\Categorie;
use App\Produit;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;

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
            'code' => ['name' => 'code', 'type' => Type::string()],
            'nom' => ['name' => 'nom', 'type' => Type::string()],
            'produits' => ['name' => 'produits', 'type' => Type::listOf(GraphQL::type('produits'))],
            'souscategories' => ['name' => 'souscategories', 'type' => Type::listOf(GraphQL::type('categories'))]
        ];
    }

    public function resolve($root, $args)
    {
        $query=Categorie::with('products');
        if (isset($args['code'])) {
            $query = $query->where('code', $args['code']);
        }
        return $query->get()->filter(function (Categorie $ctg){
            return $ctg->parent == null;
        })->map(function (Categorie $ctg)
        {
            return [
                'code' => $ctg->code,
                'nom' => $ctg->nom,
                'description' => $ctg->description,
                'produits' => $ctg->products,
                'souscategories' => $ctg->souscategories,
                'parent' => $ctg->parent
            ];
        });
    }
}