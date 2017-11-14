<?php

namespace App\Http\Controllers;

use App\DetailsListe;
use App\Liste;
use App\Outils;
use App\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ListeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('guest');
    }

    public function createjson() {
        $data = json_decode(Input::get('data'));
        $code = '';

        if(!empty($code))
            $liste = Liste::where('code', $code)->first();
        else
        {
            do
            {
                $code = Outils::generatecode();
                $liste = Liste::where('code', $code)->first();
            }
            while($liste != null);
            $liste = new Liste();
            $liste->code = $code;
        }

        $liste->nom = $data->nom;
        $liste->client_code = Input::get('client_code');
        $liste->save();

        $path = '{listes(code: "' . $liste->code . '" ) {code, nom, client{code},created_at,updated_at,details{id,quantite,produit{code,designation,prix, image } } } } ';
        return redirect('graphql?query='.urlencode($path));
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
