<?php

namespace App;

use App\Authority\Role;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class Outils
{
    public static function image($request)
    {
        $name = $request->getClientOriginalName();
        Image::make($request)->resize(env('IMG_WIDTH'), env('IMG_HEIGHT'))->save($name);
        $data = base64_encode(file_get_contents($name));

        File::delete($name);

        $ext=explode('.',$name);
        return 'data:image/'.end($ext).';base64,'.$data;
    }


    public static function generatecode()
    {
        return substr(str_shuffle(env('CODE_POOL')), 0, env('CODE_LENGTH'));
    }


    public static function pathToBase64($path)
    {
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        return $base64;
    }


    public static function formatdate()
    {
        return "Y-m-d H:i:s";
    }


    public static function FirstLaunch()
    {
        $roles = array();
        array_push($roles,array("name" => "admin"));
        array_push($roles,array("name" => "surface"));
        foreach ($roles as $role)
        {
            if (!Role::all()->where('name', $role['name'])->first() && !Role::onlyTrashed()->where('name', $role['name'])->get()->first()) {
                $newrole = new Role();
                $newrole->name = $role['name'];
                $newrole->save();
            }
        }

        $users = array();
        array_push($users,array("username" => "root" , "email" => "root@kdi.sn" , "image" => self::pathToBase64('images/logo.png') , "password" => "root" , "role" => "admin"));

        foreach ($users as $user)
        {
            if (!User::all()->where('email', $user['email'])->first() && !Role::onlyTrashed()->where('email', $user['email'])->get()->first()) {

                $newuser = new User();
                $newuser->code = Outils::generatecode();
                $newuser->username = $user['username'];
                $newuser->email = $user['email'];
                $newuser->password = bcrypt($user['password']);
                $newuser->image = $user['image'];
                $newuser->save();

                $role = Role::where('name', $user['role'])->first();
                $newuser->roles()->attach($role);
            }
        }
    }
}