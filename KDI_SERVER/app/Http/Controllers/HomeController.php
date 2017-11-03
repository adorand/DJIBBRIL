<?php

namespace App\Http\Controllers;

use App\Outils;
use App\Surface;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        Outils::FirstLaunch();
        $this->middleware('auth');
    }


    public function index()
    {
        return view('accueil');
    }
}
