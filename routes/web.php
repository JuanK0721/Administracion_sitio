<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenusController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('layouts.main2');
});*/

Route::get('/', function () {
  return view('admin');
})->middleware('auth');

Route::resource('/login', LoginController::class)->names(['index' => 'login'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout']);

Route::group(['prefix' => 'admin', 'as' => 'admin', 'middleware' => 'auth'],function(){
  Route::get('/',function(){ return view('admin'); });
  Route::resource('/usuarios', UsuariosController::class);
  Route::resource('/roles', RolesController::class);
  Route::resource('/permisos', PermisosController::class);
  Route::resource('/menus', MenusController::class);
});
