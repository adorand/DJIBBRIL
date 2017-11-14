<?php

namespace App\Http\Controllers;

use App\Commande;
use App\DetailsCommande;
use App\DetailsListe;
use App\Liste;
use App\Outils;
use App\Produit;
use Illuminate\Support\Facades\Input;

class DetaillisteController extends Controller
{
    public function  createjson()
    {
        $data = json_decode(Input::get('data'));
        $produit_code=$data->produit_code;
        $liste_code=$data->liste_code;
        $quantite = $data->quantite;
        $liste=Liste::where('code',$liste_code)->first();

        $detailsListe=DetailsListe::where('liste_code', $liste->code)->where('produit_code',$produit_code)->first();

        if (!$detailsListe)
        {
            $detailsListe = new DetailsListe();
        }

        $detailsListe->liste_code = $liste->code;
        $detailsListe->quantite = $quantite;
        $detailsListe->produit_code = $produit_code;

        $detailsListe->save();

        $detailsListe=DetailsListe::where('liste_code', $liste->code)->where('produit_code',$produit_code)->first();
        $path='{detailslistes(id : $id) {id,quantite,produit{code,designation,prix},created_at,updated_at}}';
        $path = str_replace('$id',$detailsListe->id,$path);
        return redirect('graphql?query='.urlencode($path));
    }


}
