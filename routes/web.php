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

//Route::get('/',[HomeController::class, 'index']);
//Route::get('/usuarios', [UserController::class, 'index']);



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('usuarios', [App\Http\Controllers\UserController::class, 'index']) ->name('usuario.create');

Route::get('usuarios/create', [App\Http\Controllers\UserController::class, 'create'])->name('usuarios');
Route::post('usuarios',[UserController::class, 'store'])->name('usuarios.store');
Route::get('usuarios/{id}/edit',[UserController::class, 'edit'])->name('usuarios.edit');
Route::put('usuarios/{id}',[UserController::class, 'update'])->name('usuarios.update');




/*
Route::get('/usuarios', function () {
    return view('usuarios');
});
*/
