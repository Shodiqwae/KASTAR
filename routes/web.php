<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterAdmin;
use App\Http\Controllers\LoginAdmin;
use App\Http\Controllers\HomeAdmin;
use App\Http\Controllers\PAdminController;

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
Route::post('login', [LoginAdmin::class, 'login'])->name('login.post');

Route::get('HomeA', [HomeAdmin::class, 'index'])->name('HomeA');

Route::get('ProductsA', [PAdminController::class, 'index'])->name('products.index');
Route::post('ProductsA', [PAdminController::class, 'store'])->name('products.store');
Route::get('/products/{id}/edit', [PAdminController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [PAdminController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [PAdminController::class, 'destroy'])->name('products.destroy');




Route::get('HomeP', [HomePetugas::class, 'index'])->name('HomeP');



