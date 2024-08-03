<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePetugas extends Controller
{
    public function index()
    {
        return view('Petugas.HomeP');
    }
}
