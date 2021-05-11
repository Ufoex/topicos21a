<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\HomeController;
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




Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('usuarios', [App\Http\Controllers\UserController::class, 'index']) ->name('usuario.create')->middleware('auth');

Route::get('usuarios/create', [App\Http\Controllers\UserController::class, 'create'])->name('usuarios');
Route::post('usuarios',[UserController::class, 'store'])->name('usuarios.store');
Route::get('usuarios/{id}/edit',[UserController::class, 'edit'])->name('usuarios.edit');
Route::put('usuarios/{id}',[UserController::class, 'update'])->name('usuarios.update');
Route::delete('usuarios/{id}',[UserController::class, 'destroy'])->name('usuarios.destroy');
Route::get('usuarios/{id}/show',[UserController::class,'show'])->name('usuarios.show');






