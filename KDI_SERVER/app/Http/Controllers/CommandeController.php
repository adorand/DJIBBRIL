<?php

namespace App\Http\Controllers;

use App\Commande;
use App\DetailsCommande;
use App\Produit;

class CommandeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('guest');
    }

    public function  create($data) {
        $commande_json = json_decode($data);

        $commande = Commande::where('client_code', $commande_json->clientCode)->where('etat', 0)->first();
        if (!$commande) {
            $code = '';
            do {
                $code = substr(str_shuffle(env('CODE_POOL')), 0, env('CODE_LENGTH'));
                $commande = Commande::where('code', $code)->first();
            } while($commande != null);

            $commande = new Commande();
            $commande->code = $code;
            $commande->etat = 0;
            $commande->client_code = $commande_json->clientCode;

            $commande->save();
        }

        $produit = Produit::where('code' ,$commande_json->codeProduit)->first();
        if ($produit->quantite == 0) {
            return null;
        }

        $details = DetailsCommande::where('commande_code', $commande->code)->first();
        if (!$details) {
            $details = new DetailsCommande();
            $details->produit_code = $commande_json->codeProduit;
            $details->commande_code = $commande->code;
            $details->quantite =1;
        } else {
            $details->quantite += 1;
        }
        $details->save();

        $produit->quantite -= 1;
        $produit->save();


        return json_encode($commande);
    }

    public function removeFromCommande($data)
    {
        $data = json_decode($data);

        $details = DetailsCommande::where('produit_code', $data->codeProduit)->first();
        if (!$details) {
            return null;
        } else {
            $details->quantite -= 1;
            if ($details->quantite == 0) return null;
            $produit = Produit::where('code' ,$data->codeProduit)->first();
            $produit->quantite += 1;
            $produit->save();

            $details->save();
        }
        return json_encode($details);
    }

    public function update($data) {
        $commande_json = json_decode($data);

        $commande = Commande::where('code', $commande_json->code)->first();
        if ($commande_json->etat) $commande->etat = $commande_json->etat;

        $commande->save();

        return json_encode($commande);
    }

    public function delete($data){
        $code = json_encode($data)->code;
        $commande = Commande::where('code', $code)->get();
        $commande->delete();

        return 'Utilisateur supprimé';
    }


}
