<?php declare(strict_types=1);

namespace App\GraphQL\Serializers;
use App\Outils;
use App\Produit;


class ProduitSerializer extends AbstractSerializer
{

    public static function to($prod)
    {
        return [
            'code'        => $prod->code,
            'designation' => $prod->designation,
            'description' => $prod->description,
            'created_at'  => $prod->created_at->format(Outils::formatdate()),
            'updated_at'  => $prod->updated_at->format(Outils::formatdate()),
            'quantite'    => $prod->quantite,
            'prix'        => $prod->prix,
            'image'       => $prod->image
        ];
    }

}