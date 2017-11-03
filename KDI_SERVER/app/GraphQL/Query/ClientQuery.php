<?php

namespace App\GraphQL\Query;

use App\Client;
use App\Commande;
use App\DetailsCommande;
use App\Outils;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;
use Illuminate\Support\Facades\Hash;

class ClientQuery extends Query
{
    protected $attributes = [
        'name' => 'Client query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('clients'));
    }

    public function args()
    {
        return [
            'code'     => ['name' => 'code', 'type' => Type::string()],
            'email'    => ['name' => 'email', 'type' => Type::string()],
            'password' => ['name' => 'password', 'type' => Type::string()],
        ];
    }

    public function resolve($root, $args)
    {
        $query=Client::with('commandes')->with('listes');
        if (isset($args['code']))
        {
            $query = $query->where('code', $args['code']);
        }
        else if (isset($args['email']))
        {
            $query = $query->where('email', $args['email']);

            if(isset($args['password']))
            {
                if ( !(Hash::check($args['password'], $query->get()[0]->password)) )
                    return [];
            }
        }

        return $query->get()->map(function (Client $client)
        {
            return [
                'code'       => $client->code,
                'nom'        => $client->nom,
                'telephone'  => $client->telephone,
                'email'      => $client->email,
                'password'   => $client->password,
                'image'      => $client->image,
                'created_at' => $client->created_at->format(Outils::formatdate()),
                'updated_at' => $client->updated_at->format(Outils::formatdate()),
                'commandes'  => $client->commandes->map(function (Commande $commande)
                {
                    return [
                        'code'       => $commande->code,
                        'etat'       => $commande->etat,
                        'client'     => $commande->client,
                        'details'    => $commande->details->map(function (DetailsCommande $detailsCommande)
                        {
                            return [
                                'id'         => $detailsCommande->id,
                                'produit'    => $detailsCommande->produit,
                                'quantite'   => $detailsCommande->quantite,
                                'commande'   => $detailsCommande->commande,
                                'created_at' => $detailsCommande->created_at->format(Outils::formatdate()),
                                'updated_at' => $detailsCommande->updated_at->format(Outils::formatdate()),
                            ];
                        }),
                        'created_at' => $commande->created_at->format(Outils::formatdate()),
                        'updated_at' => $commande->updated_at->format(Outils::formatdate()),
                    ];
                }),
                'listes'     => $client->listes,
            ];
        });
    }
}