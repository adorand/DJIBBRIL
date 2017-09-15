<?php

namespace App\GraphQL\Query;
use App\GraphQL\Serializers\ProduitSerializer;
use App\Outils;
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
        $query=Produit::all();
        if (isset($args['code']))
        {
            $query = Produit::where('code' , $args['code'])->get();
        }

//        return ProduitSerializer::collection($query);
        // return PenseeSerializers::collection($query->get());
        // Si on ajoute ça, il faut ajouter devant la fonction :collection

        return $query->map(function (Produit $prod)
        {
//            return ProduitSerializer::collection($prod);
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
        });

    }
}