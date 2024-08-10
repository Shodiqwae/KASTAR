<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterAdmin;
use App\Http\Controllers\LoginAdmin;
use App\Http\Controllers\HomeAdmin;
use App\Http\Controllers\HomePetugas;
use App\Http\Controllers\PAdminController;
use App\Http\Controllers\ProdukPetugasController;
use App\Http\Controllers\CrudPetugasController;
use App\Http\Controllers\CrudAdminController;
use App\Http\Controllers\ProfileAdminController;
use App\Http\Controllers\HitoryPetugasController;


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

Route::get('HistoryP', [HitoryPetugasController::class, 'index'])->name('historyP');
Route::get('HistoryPA', [HitoryPetugasController::class, 'historyadmin'])->name('historyA');


Route::post('/confirm-order', [HomePetugas::class, 'store'])->name('penjualan.store');

Route::resource('CrudPetugas', CrudPetugasController::class);
Route::resource('CrudAdmin', CrudAdminController::class);

Route::get('/profile', [ProfileAdminController::class, 'edit'])->name('profile.edit');
Route::get('/profile-petugas', [ProfileAdminController::class, 'profilepetugas'])->name('profile.petugas');

// Route untuk memperbarui data profil
Route::post('/profile', [ProfileAdminController::class, 'update'])->name('profile.update');
Route::post('/logout', [LoginAdmin::class, 'logout'])->name('logout');





Route::get('HomeP', [HomePetugas::class, 'index'])->name('HomeP');
Route::get('ProductsP', [ProdukPetugasController::class, 'index'])->name('productsP.index');
Route::post('ProductsP', [ProdukPetugasController::class, 'store'])->name('products.store');
Route::get('/products/{id}/edit', [ProdukPetugasController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProdukPetugasController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProdukPetugasController::class, 'destroy'])->name('products.destroy');


