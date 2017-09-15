<?php declare(strict_types=1);

namespace App\GraphQL\Serializers;
use App\Outils;


class CategorieSerializer extends AbstractSerializer
{

    public function toArray($ctg): array
    {
        return [
            'code' => $ctg->code,
            'nom' => $ctg->nom,
            'description' => $ctg->description,
            'created_at' => $ctg->created_at->format(Outils::formatdate()),
            'updated_at' => $ctg->updated_at->format(Outils::formatdate()),
            'souscategories' => $ctg->souscategories->map(function (Categorie $ssctg){
                return [
                    'code' => $ssctg->code,
                    'nom' => $ssctg->nom,
                    'description' => $ssctg->description,
                    'created_at' => $ssctg->created_at->format(Outils::formatdate()),
                    'updated_at' => $ssctg->updated_at->format(Outils::formatdate()),
                    'parent' => $ssctg->parent,
                    'produits' => $ssctg->products->map(function (Produit $prod){
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
            })
        ];
    }

}