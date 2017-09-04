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

    public function categorie()
    {
        $nom = Input::get('nom');
        $desc = Input::get('description');
        $parent = Input::get('id_parent');
        $code = '';
        do {
            $code = substr(str_shuffle(env('CODE_POOL')), 0, env('CODE_LENGTH'));
            $categorie = Categorie::where('code', $code)->first();
        } while($categorie != null);

        $categorie = new Categorie();
        $categorie->code = $code;
        $categorie->nom = $nom;
        $categorie->surface_code = Auth::user()->code;

        if (!empty($desc)) $categorie->description = $desc;
        if (!empty($parent)) $categorie->code_parent = $parent;
        $categorie->save();

        return redirect('categories');
    }

    public function categories()
    {
        return json_encode(Categorie::all());
    }

    public function product()
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

    public function products() {
        return view('products')->with('products', Produit::all());
    }
}
