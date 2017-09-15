<?php declare(strict_types=1);

namespace App\GraphQL\Serializers;
use App\Outils;


class SouscategorieSerializer extends AbstractSerializer
{

    public function toArray($ssctg): array
    {
        return [
            'code' => $ssctg->code,
            'nom' => $ssctg->nom,
            'description' => $ssctg->description,
            'created_at' => $ssctg->created_at->format(Outils::formatdate()),
            'updated_at' => $ssctg->updated_at->format(Outils::formatdate()),
            'parent' => $ssctg->parent,
            'produits' => $ssctg->products->map(function (Produit $prod){
                return ProduitSerializer::collection($prod);
            })
        ];
    }

}