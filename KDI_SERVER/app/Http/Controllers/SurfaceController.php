<?php

namespace App\Http\Controllers;

use App\Authority\Role;
use App\Outils;
use App\Surface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class SurfaceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function create()
    {

        $code = Input::get('code');
        if(!empty($code))
            $surface = Surface::where('code', $code)->first();
        else
        {
            do
            {
                $code = Outils::generatecode();
                $surface = Surface::where('code', $code)->first();
            }
            while($surface != null);
            $surface = new Surface();
            $surface->code = $code;
        }
        $surface->nom = Input::get('nom');
        !empty(Input::file('image')) ? $surface->image = Outils::image(Input::file('image')) : '';


        //CREATION D'UN USER LIÉ A LA SURFACE QUI SERA CRÉEE

        if (!empty($surface->created_at))
        {
            $user = User::where('code', $surface->user_code)->first();
        }
        else
        {
            do
            {
                $code = Outils::generatecode();
                $user = User::where('code', $code)->first();
            }
            while($user != null);
            $user = new User();
            $user->code = $code;
        }


        $user->username = $surface->nom;
        $user->email = Input::get('email');
        !empty(Input::get('password')) ? $user->password = bcrypt(Input::get('password')) : '' ;
        $user->image = $surface->image;
        $user->save();

        $role = Role::where('name', 'surface')->first();
        $user->roles()->attach($role);

        $surface->user_code = $user->code;
        $surface->save();

        $path='{ surfaces(code: "'.$surface->code.'") { code, nom, image, created_at, updated_at, user { code, username, email, password, image } } }';
        return redirect('graphql?query='.urlencode($path));
    }

    public function delete($code)
    {
        $surface = Surface::where('code', $code)->first();
        $user = User::where('code', $surface->user_code)->first();
        $user->delete();
        return json_encode($surface->delete());
    }
}
