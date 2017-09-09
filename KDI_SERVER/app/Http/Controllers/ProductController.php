<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Outils;
use App\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
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
        $code = '';
        do {
            $code = substr(str_shuffle(env('CODE_POOL')), 0, env('CODE_LENGTH'));
            $produit = Produit::where('code', $code)->first();
        } while($produit != null);

        $produit = new Produit();
        $produit->code = $code;
        $produit->designation = Input::get('designation');
        $produit->description = Input::get('description');
        $produit->quantite = Input::get('quantite');
        $produit->prix = Input::get('prix');
        $produit->categorie_code = Input::get('categorie');
        $produit->image = Outils::image(Input::file('image'));
        $produit->save();

        return json_encode($produit);
    }

    public function fetch() {
        return view('products')->with('products', Produit::all());
    }

    public function get($code) {
        if (!empty($produit = Produit::where('code', $code)->first())) return $produit->categorie->parent;
        return null;
    }

    public function update($code) {
        $produit = Produit::where('code', $code)->first();

        if (Input::get('designation')) $produit->designation = Input::get('designation');
        if (Input::get('description')) $produit->description = Input::get('description');
        if (Input::get('quantite')) $produit->quantite = Input::get('quantite');
        if (Input::get('prix')) $produit->prix = Input::get('prix');
        if (Input::get('categorie')) $produit->categorie_code = Input::get('categorie');
        if (Input::get('image')) $produit->image = Outils::image(Input::file('image'));
        $produit->save();

        return 'Le produit a  bien été mise a jour';
    }

    public function delete($code) {
        $produit = Produit::where('code', $code)->first();
        $produit->delete();

        return 'Le produit a  bien été supprimé';
    }
}
