<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProviderController;
use App\Models\Provider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentasController;
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

Route::get('/home', [HomeController::class, 'index']);
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('usuarios', [UserController::class, 'index']) ->name('usuario.create')->middleware('auth');

Route::get('usuarios/create', [UserController::class, 'create'])->name('usuarios');
Route::post('usuarios',[UserController::class, 'store'])->name('usuarios.store');
Route::get('usuarios/{id}/edit',[UserControler::class, 'edit'])->name('usuarios.edit')->middleware(['auth']);
Route::put('usuarios/{id}',[UserController::class, 'update'])->name('usuarios.update')->middleware(['auth']);
Route::delete('usuarios/{id}',[UserController::class, 'destroy'])->name('usuarios.destroy')->middleware(['auth']);
Route::get('usuarios/{id}/show',[UserController::class,'show'])->name('usuarios.show');


//RUTAS DE PRODUCTOS hola
Route::resource('productos', ProductoController::class)->middleware(['auth']);

//RUTAS DE PROVEEDORES
Route::resource('proveedores', ProviderController::class)->middleware(['auth','role:Admin']);

//RUTAS DE CLIENTES
Route::resource('clientes', ClienteController::class)->middleware(['auth']);

//RUTAS DE VENTAS
Route::resource('ventas', VentasController::class)->middleware('auth');
