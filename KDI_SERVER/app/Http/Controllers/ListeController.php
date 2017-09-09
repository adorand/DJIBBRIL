<?php

namespace App\Http\Controllers;

use App\DetailsListe;
use App\Liste;
use App\Produit;
use Illuminate\Http\Request;

class ListeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('guest');
    }
    public function create($data) {
        $liste_json = json_decode($data);

        $code = '';
        do {
            $code = substr(str_shuffle(env('CODE_POOL')), 0, env('CODE_LENGTH'));
            $liste = Liste::where('code', $code)->first();
        } while($liste != null);

        $liste = new Liste();
        $liste->code = $code;
        if ($liste_json->libelle) $liste->libelle = $liste_json->libelle;
        $liste->client_code = $liste_json->userCode;
        $liste->etat = 0;

        $liste->save();

        return json_encode($liste);
    }

    public function addToListe($data)
    {
        $data = json_decode($data);

        $produit = Produit::where('code' ,$data->codeProduit)->first();
        if ($produit->quantite == 0) {
            return null;
        }

        $details = DetailsListe::where('produit_code', $data->codeProduit)->first();
        if (!$details) {
            $details = new DetailsListe();
            $details->produit_code = $data->codeProduit;
            $details->liste_code = $data->codeListe;
            $details->quantite =1;
        } else {
            $details->quantite += 1;
        }
        $details->save();

        $produit->quantite -= 1;
        $produit->save();

        return json_encode($details);
    }

    public function update ($data) {
        $liste_json = json_decode($data);

        $liste = Liste::where('code', $liste_json->code)->get();
        if ($liste_json->libelle) $liste->libelle = $liste_json->libelle;
        if ($liste_json->etat) $liste->etat = $liste_json->etat;

        $liste->save();

        return json_encode($liste);
    }

    public function delete($data){
        $code = json_encode($data)->code;
        $liste = Liste::where('code', $code)->get();
        $liste->delete();

        return 'La liste a été supprimée';
    }
}
