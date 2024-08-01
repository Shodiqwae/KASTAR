<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterAdmin;
use App\Http\Controllers\LoginAdmin;
use App\Http\Controllers\HomeAdmin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Login.LoginAdmin');
});
Route::get('/register', function () {
    return view('Register.RegisterAdmin');
});

Route::get('register', [RegisterAdmin::class, 'index'])->name('register.admin');
Route::post('register', [RegisterAdmin::class, 'register'])->name('register.admin.post');


Route::get('Login', [LoginAdmin::class, 'index'])->name('login');

Route::get('HomeA', [HomeAdmin::class, 'index'])->name('HomeA');
