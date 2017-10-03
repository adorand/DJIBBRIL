<?php

namespace App\Http\Controllers;

use App\Membre;
use App\Outils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class MembreController extends Controller
{
    public function __construct()
    {
        //$this->middleware('guest');
    }


    public function  create() {
        $code = Input::get('code');
        if(!empty($code))
            $membre = Membre::where('code', $code)->first();
        else
        {
            do
            {
                $code = Outils::generatecode();
                $membre = Membre::where('code', $code)->first();
            }
            while($membre != null);
            $membre = new Membre();
            $membre->code = $code;
        }
        $membre->nom = Input::get('nom');
        $membre->email = Input::get('email');
        $membre->telephone = Input::get('telephone');
        !empty(Input::get('password')) ? $membre->password = bcrypt(Input::get('password')) : '' ;
        !empty(Input::file('image')) ? $membre->image = Outils::image(Input::file('image')) : '';

        $membre->save();

        $path='{ membres(code : "'.$membre->code.'") { code, nom, email, telephone, image, created_at, updated_at } }';
        return redirect('graphql?query='.urlencode($path));
    }

//    public function login($data) {
//        $email = json_decode($data)->email;
//        $password = json_decode($data)->password;
//
//        if ($membre = Membre::where('email', $email)->first())
//        {
//            if(Hash::check($password, $membre->password))
//            {
//                return json_encode($membre);
//            }
//        }
//        return null;
//    }


    public function delete($code)
    {
        $membre = Membre::where('code', $code)->first();
        return json_encode($membre->delete());
    }
}
