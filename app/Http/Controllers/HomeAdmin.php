<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeAdmin extends Controller
{

    public function index()
    {
        return view('Admin.HomeA');
    }

}
