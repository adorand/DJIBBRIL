<?php

namespace App\Http\Controllers;

use App\Surface;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->loadAndAuthorizeResource();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('users.index')->with('users', User::all());
    }

}
