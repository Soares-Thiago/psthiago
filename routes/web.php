<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


//rotas de crud

Route::any('projetos/search', 'ProjetoController@search')->name('projetos.search')->middleware('auth');
Route::put('projetos/desactive/{id}', "ProjetoController@desactive")->name("projetos.desactive")->middleware('auth');;
Route::put('projetos/active/{id}', "ProjetoController@active")->name("projetos.active")->middleware('auth');;
Route::resource("projetos", "ProjetoController")->middleware('auth');

Auth::routes(['register' => false]);

Route::get('/admin', 'HomeController@index')->name('admin');
