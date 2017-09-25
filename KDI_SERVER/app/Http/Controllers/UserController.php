<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    public function __construct()
    {
        //$this->middleware('guest');
    }

    public function  auth() {
        $path='{ users(code: "'.Auth::user()->code.'") { code, username, email, image, created_at, updated_at } }';
        return redirect('graphql?query='.urlencode($path));
    }

    public function alltables()
    {
        // Get the default database name
        /*$dbName = config('database.connections.' . config('database.default') . '.database');

        $tables = DB::select("");

        foreach($tables as $table)
        {
            Schema::table($table->{'Tables_in_' . $dbName}, function($table) {
                // Add the column
                $table->string('some_column');
            });
        }*/
    }

    public function  create() {
        $data = Input::get('data');
        $user_json = json_decode($data);
        $code = '';
        do {
            $code = substr(str_shuffle(env('CODE_POOL')), 0, env('CODE_LENGTH'));
            $user = User::where('code', $code)->first();
        } while($user != null);

        $user = new User();
        $user->code = $code;
        $user->username = $user_json->name.$code;
        $user->email = $user_json->email.$code;
        $user->telephone = $user_json->telephone.$code;
        $user->password = bcrypt($user_json->password);

        $user->save();

        return json_encode($user);
    }

    public function get($data) {
        $code = json_encode($data)->code;
        if ($user = User::where('code', $code)->first()) return json_encode($user);
        return null;
    }

    public function update($data) {
        $user_json = json_decode($data);

        $user = User::where('code', $user_json->code)->first();
        if ($user_json->name) $user->username = $user_json->name;
        if ($user_json->email) $user->email = $user_json->email;
        if ($user_json->telephone) $user->telephone = $user_json->telephone;

        $user->save();

        return json_encode($user);
    }

    public function delete($data){
        $code = json_encode($data)->code;
        $user = User::where('code', $code)->first();
        $user->delete();

        return 'Utilisateur supprimé';
    }
}
