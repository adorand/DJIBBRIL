<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {

    }

    public function  register($data) {
        $user_json = json_decode($data);
        $code = '';
        do {
            $code = substr(str_shuffle(env('CODE_POOL')), 0, env('CODE_LENGTH'));
            $user = User::where('code', $code)->first();
        } while($user != null);

        $user = new User();
        $user->code = $code;
        $user->username = $user_json->name.$code;
        $user->email = $user_json->email .$code;
        $user->telephone = $user_json->telephone.$code;
        $user->password = $user_json->password;

        $user->save();

        return json_encode($user);
    }
}
