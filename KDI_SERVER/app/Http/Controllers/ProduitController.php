<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Outils;
use App\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ProduitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categorie = Categorie::where('surface_code', Auth::user()->code)->whereNotNull('code_parent')->get();
        return view('product')->with('categories', $categorie);
    }

    public function create()
    {

        $code = Input::get('code');
        if(!empty($code))
            $produit = Produit::where('code', $code)->first();
        else
        {
            do
            {
                $code = Outils::generatecode();
                $produit = Produit::where('code', $code)->first();
            }
            while($produit != null);
            $produit = new Produit();
            $produit->code = $code;
        }

        $produit->designation = Input::get('designation');
        $produit->description = !empty(Input::get('description')) ? Input::get('description') : '';
        $produit->quantite = Input::get('quantite');
        $produit->prix = Input::get('prix');
        $produit->categorie_code = Input::get('souscategorie');
        !empty(Input::file('image')) ? $produit->image = Outils::image(Input::file('image')) : '';
        $produit->save();
        $path='{ produits(code : "'.$produit->code.'") { code, designation, description, quantite, prix image, created_at, updated_at, souscategorie { code,nom } } }';
        return redirect('graphql?query='.urlencode($path));
    }

    public function fetch()
    {
        return view('products')->with('products', Produit::all());
    }

    public function get($code) {
        if (!empty($produit = Produit::where('code', $code)->first())) return $produit->categorie->parent;
        return null;
    }

    public function delete($code)
    {
        $produit = Produit::where('code', $code)->first();
        return json_encode($produit->delete());
    }
}
