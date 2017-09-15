<?php

namespace App\Http\Controllers\Auth;

use App\Outils;
use App\Authority\Role;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'image' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Surface
     */
    protected function create(array $data)
    {
        $code = '';
        do
        {
            $code = Outils::generatecode();
            $user = User::where('code', $code)->first();
        } while($user != null);

        $user=new User();
        $user->code=$code;
        $user->username=$data['username'];
        $user->email=$data['email'];
        $user->password = bcrypt($data['password']);
        !empty($data['image']) ? $user->image = Outils::image($data['image']) : '';

        $user->save();

        $role = Role::where('name', 'admin')->first();

        $user->roles()->attach($role);
        return $user;
    }
}
