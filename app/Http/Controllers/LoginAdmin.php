<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginAdmin extends Controller
{
    public function index()
    {
        return view('Login.LoginAdmin');
    }
}
