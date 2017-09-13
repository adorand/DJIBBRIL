<?php

namespace App\Http\Controllers;

use App\Categorie;
use Illuminate\Http\Request;
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
        $code = '';
        do
        {
            $code = \App\Utilities::generatecode();
            $categorie = Categorie::where('code', $code)->first();
        }
        while($categorie != null);

        $categorie = new Categorie();
        $categorie->code = $code;
        $categorie->nom = Input::get('nom');
        $categorie->description = Input::get('description') || '';
        $categorie->code_parent = Input::get('id_parent') || '';
        $categorie->surface_code = Auth::user()->code;

        /*if (!empty($desc)) $categorie->description = $desc;
        if (!empty($parent)) $categorie->code_parent = $parent;*/
        $categorie->save();
        return json_encode($categorie);
        //return redirect('categories');
    }

    public function fetch () {
        return json_encode(Categorie::all());
    }

    public function get($code) {
        $categorie = Categorie::where('code', $code)->first();
        if ($categorie) return $categorie;
        return null;
    }

    public function update($code) {

        $cat = Categorie::where('code', $code)->first();

        if (Input::get('nom')) $cat->nom = Input::get('nom');
        if (Input::get('description')) $cat->description = Input::get('description');
        if (Input::get('code_parent')) $cat->code_parent = Input::get('code_parent');

        $cat->save();

        return 'La categorie a  bien été mise a jour';
    }

    public function delete ($code) {
        $cat = Categorie::where('code', $code)->first();
        $cat->delete();

        return 'La categorie a  bien été mise a jour';
    }

}
