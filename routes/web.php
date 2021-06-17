<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//RUTAS DE USUARIO
Auth::routes();


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('usuarios', [UserController::class, 'index']) ->name('usuario.create')->middleware('auth');

Route::get('usuarios/create', [UserController::class, 'create'])->name('usuarios');
Route::post('usuarios',[UserController::class, 'store'])->name('usuarios.store');
Route::get('usuarios/{id}/edit',[UserControler::class, 'edit'])->name('usuarios.edit')->middleware('auth');
Route::put('usuarios/{id}',[UserController::class, 'update'])->name('usuarios.update')->middleware('auth');
Route::delete('usuarios/{id}',[UserController::class, 'destroy'])->name('usuarios.destroy')->middleware('auth');
Route::get('usuarios/{id}/show',[UserController::class,'show'])->name('usuarios.show');

Route::get('/dino', function () {
    return view('layouts.app2');
})->name('dino');


//RUTAS DE PRODUCTOS
Route::get('productos', [ProductoController::class, 'index']) ->name('productos.index')->middleware('auth');
Route::get('productos', [ProductoController::class, 'index']) ->name('producto.create')->middleware('auth');
Route::post('productos',[ProductoController::class, 'store'])->name('productos.store');
Route::delete('productos/{id}',[ProductoController::class, 'destroy'])->name('productos.destroy')->middleware('auth');
Route::put('productos/{id}',[ProductoController::class, 'update'])->name('productos.update')->middleware('auth');
Route::get('productos/{id}/edit',[ProductoController::class, 'edit'])->name('productos.edit')->middleware('auth');

//RUTAS DE PROVEEDORES
Route::resource('provedores',\App\Models\Provider::class);


