<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function index_login()
    {
        return view('auth.login');
    }


    public function index_signIn()
    {
        return view('auth.signin');
    }

    public function login(Request $request)
    {
        return view('auth.login');
    }

    public function signIn(Request $request)
    {
        return view('auth.signin');
    }
}
