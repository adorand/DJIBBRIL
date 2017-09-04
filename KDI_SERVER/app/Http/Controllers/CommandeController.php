<?php

namespace App\Http\Controllers;

use App\Produit;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('commande')->with('products',  Produit::all());
    }

    public function save($code){

        return $code;
    }


}
