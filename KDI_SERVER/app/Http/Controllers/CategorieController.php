<?php

namespace App\Http\Controllers;

use App\Categorie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class CategorieController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        return view('categorie');
    }

    public function create ()
    {
        $code = Input::get('code');
        if(!empty($code))
            $categorie = Categorie::where('code', $code)->first();
        else
        {
            do
            {
                $code=\App\Outils::generatecode();
                $categorie = Categorie::where('code', $code)->first();
            }
            while($categorie != null);
            $categorie = new Categorie();
            $categorie->code=$code;
        }

        $categorie->nom          = Input::get('nom');
        $categorie->description  = !empty(Input::get('description')) ? Input::get('description') : '';
        $categorie->code_parent  = !empty(Input::get('code_parent')) ? Input::get('code_parent') : '';
        empty($categorie->created_at) ? $categorie->surface_code =  Auth::user()->code : '' ;

        $categorie->save();

        //$addcritere = Auth::user()->hasrole('surface')==1 ? ', surface_code : "'.Auth::user()->code.'")' : '';

        $path = empty($categorie->code_parent) ? '{ categories( code : "'.$categorie->code.'") { code, nom, description, created_at, updated_at, surface_code, souscategories { code, nom, description, created_at, updated_at, parent { code, nom }, produits { code, designation, description, quantite, prix image, created_at, updated_at, souscategorie { code,nom } } } } }'
            :'{ souscategories(code : "'.$categorie->code.'") { code, nom, description, created_at, updated_at, parent { code, nom }, produits { code, designation, description, quantite, prix, image, created_at, updated_at, souscategorie { code,nom } } } }';
        return redirect('graphql?query='.urlencode($path));
    }

    public function fetch () {
        return json_encode(Categorie::all());
    }

    public function get($code) {
        $categorie = Categorie::where('code', $code)->first();
        if ($categorie) return $categorie;
        return null;
    }

    public function delete ($code)
    {
        $cat = Categorie::where('code', $code)->first();
        return json_encode($cat->delete());
    }

}
