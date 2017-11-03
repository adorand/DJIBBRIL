<?php

namespace App\Http\Controllers;

use App\Commande;
use App\DetailsCommande;
use App\Outils;
use App\Produit;
use Illuminate\Support\Facades\Input;

class DetailcommandeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('guest');
    }

    public function  createjson_liste()
    {
        $parsedcmd = json_decode(Input::get('data'));
        $client_code = $parsedcmd->client_code;
        foreach ($parsedcmd->items as $data)
        {
            $produit_code=$data->productId;
            $quantite = $data->quantity;
            $commande=Commande::where('client_code',$client_code)->where('etat',0)->first();

            if (!$commande)
            {
                do
                {
                    $code = Outils::generatecode();
                    $commande = Commande::where('code', $code)->first();
                }
                while($commande != null);

                $commande = new Commande();
                $commande->code = $code;
                $commande->etat = 0;
                $commande->client_code = $client_code;

                $commande->save();
            }

            $detailsCommande=DetailsCommande::where('commande_code', $commande->code)->where('produit_code',$produit_code)->first();


            if (!$detailsCommande)
            {
                $detailsCommande = new DetailsCommande();
                //$quantite=$quantite;
            }
            else
            {
                $quantite +=$detailsCommande->quantite;
            }

            $detailsCommande->commande_code = $commande->code;
            $detailsCommande->quantite = $quantite;
            $detailsCommande->produit_code = $produit_code;

            $detailsCommande->save();

            $path='{ commandes(code : "'.$commande->code.'") { code,etat,details{id,quantite,produit{code,designation,prix},created_at,updated_at } } }';
            return redirect('graphql?query='.urlencode($path));
        }

    }

    public function  createjson()
    {
        $data = json_decode(Input::get('data'));
        $produit_code=$data->produit_code;
        $client_code=$data->client_code;
        $quantite = $data->quantite;
        $commande=Commande::where('client_code',$client_code)->where('etat',0)->first();

        if (!$commande)
        {
            do
            {
                $code = Outils::generatecode();
                $commande = Commande::where('code', $code)->first();
            }
            while($commande != null);

            $commande = new Commande();
            $commande->code = $code;
            $commande->etat = 0;
            $commande->client_code = $client_code;

            $commande->save();
        }

        $detailsCommande=DetailsCommande::where('commande_code', $commande->code)->where('produit_code',$produit_code)->first();


        if (!$detailsCommande)
        {
            $detailsCommande = new DetailsCommande();
            // $quantite=1;
        }
        else
        {
            //$quantite = $detailsCommande->quantite+1;
        }

        $detailsCommande->commande_code = $commande->code;
        $detailsCommande->quantite = $quantite;
        $detailsCommande->produit_code = $produit_code;

        $detailsCommande->save();


        $detailsCommande=DetailsCommande::where('commande_code', $commande->code)->where('produit_code',$produit_code)->first();
        $path='{detailscommandes(id : $id) {id,quantite,produit{code,designation,prix},created_at,updated_at}}';
        $path = str_replace('$id',$detailsCommande->id,$path);
        return redirect('graphql?query='.urlencode($path));
    }

    public function deletejson()
    {
        $data = json_decode(Input::get('data'));
        $produit_code=$data->produit_code;
        $commande_code=$data->commande_code;
        $detailsCommande=DetailsCommande::where('commande_code',$commande_code)->where('produit_code',$produit_code)->first();
        try
        {
            $detailsCommande->quantite=$detailsCommande->quantite-1;
            return ($detailsCommande->quantite <= 0) ? $this->delete($detailsCommande->id) : $detailsCommande->save()==1 ? "true" : "false" ;
        }
        catch (\Exception $e)
        {
            return "false";
        }
    }

    public function delete($id)
    {
        return json_encode(DetailsCommande::destroy($id));
    }


}
