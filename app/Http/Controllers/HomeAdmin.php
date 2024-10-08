<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;

class HomeAdmin extends Controller
{
    public function index()
    {
        $products =  Product::orderBy('created_at', 'desc')->take(6)->get();
        $totalProduct = Product::sum('stock');
        $UsersCount = User::count();
        $users = User::orderBy('created_at', 'desc')->take(5)->get();

        return view('Admin.HomeA', compact('users','products', 'UsersCount', 'totalProduct'));
    }

}
