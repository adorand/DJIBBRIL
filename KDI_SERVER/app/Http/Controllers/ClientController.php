<?php

namespace App\Http\Controllers;

use App\Client;
use App\Commande;
use App\DetailsCommande;
use App\Outils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class ClientController extends Controller
{
    public function __construct()
    {
        //$this->middleware('guest');
    }


    public function  create() {
        $code = Input::get('code');
        if(!empty($code))
            $client = Client::where('code', $code)->first();
        else
        {
            do
            {
                $code = Outils::generatecode();
                $client = Client::where('code', $code)->first();
            }
            while($client != null);
            $client = new Client();
            $client->code = $code;
        }
        $client->nom = Input::get('nom');
        $client->email = Input::get('email');
        $client->telephone = Input::get('telephone');
        !empty(Input::get('password')) ? $client->password = bcrypt(Input::get('password')) : '' ;
        !empty(Input::file('image')) ? $client->image = Outils::image(Input::file('image')) : '';

        $client->save();

        $path='{ clients(code : "'.$client->code.'") { code, nom, email, telephone, image, created_at, updated_at } }';
        return redirect('graphql?query='.urlencode($path));
    }




    private function save_panier($panier, $client_code)
    {
        //On cherche si le client a une commande non validé Sinon on crée une nouvelle commande et dans
        // tous les cas on ajoute les produits à cette commande
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


        foreach ($panier as $item)
        {
            $detailsCommande=DetailsCommande::where('commande_code', $commande->code)->where('produit_code',$item->productId)->first();

            if (!$detailsCommande)
            {
                $detailsCommande = new DetailsCommande();
                $detailsCommande->quantite = $item->quantity;
            }
            else
            {
                $detailsCommande->quantite = $detailsCommande->quantite + $item->quantity;
            }

            $detailsCommande->commande_code = $commande->code;
            $detailsCommande->produit_code = $item->productId;
            $detailsCommande->save();
        }
    }

    public function  login()
    {
        $email = Input::get('email');
        $password = Input::get('password');
        $panier = json_decode(Input::get('panier'));
        $query = Client::where('email', $email);
        if ( !(Hash::check($password, $query->first()->password)) )
            abort(500,"Mot de passe incorrecte");
        $client = $query->first();

        // Pour enrégistrer le Panier
        $this->save_panier($panier,$client->code);

        $path = '{ clients(email: "'.$email.'",password: "'.$password.'") {code, nom, email, telephone, password, image, created_at, updated_at,commandes{code,etat,details{id,quantite,produit{code,designation,prix,quantite, categorie_code},created_at,updated_at}}, listes{code,nom,created_at,updated_at}}}';
        return redirect('graphql?query='.urlencode($path));
    }


    public function  createjson()
    {
        $data = json_decode(Input::get('data'));
        $code = $data->code;
        if(!empty($code))
            $client = Client::where('code', $code)->first();
        else
        {
            do
            {
                $code = Outils::generatecode();
                $client = Client::where('code', $code)->first();
            }
            while($client != null);
            $client = new Client();
            $client->code = $code;
        }
        $client->nom = $data->nom;
        $client->email = $data->email;
        $client->telephone = $data->telephone;
        !empty($data->password) ? $client->password = bcrypt($data->password) : '' ;
        !empty($data->image) ? $client->image = $data->image : '';

        $client->save();

        $path='{ clients(code : "'.$client->code.'") { code, nom, email, telephone, image, created_at, updated_at } }';
        return redirect('graphql?query='.urlencode($path));
    }



    public function delete($code)
    {
        $client = Client::where('code', $code)->first();
        $client->delete();
        return "".$client->trashed();
    }
}
