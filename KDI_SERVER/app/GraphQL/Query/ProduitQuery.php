<?php
/**
 * Created by PhpStorm.
 * User: cedric
 * Date: 06/09/17
 * Time: 00:11
 */

namespace App\GraphQL\Query;
use App\Produit;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;

class ProduitQuery extends Query
{
    protected $attributes = [
        'name' => 'Product query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('produits'));
    }

    public function args()
    {
        return [
            'code' => ['name' => 'code', 'type' => Type::string()],
        ];
    }

    public function resolve($root, $args)
    {
        if (isset($args['code']))
        {
            return Produit::where('code' , $args['code'])->get();
        }
        else
        {
            return Produit::all();
        }
    }
}