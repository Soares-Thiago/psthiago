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

Route::any('/index', 'ThiagopsController@buscar')->name('index.buscar');

//rotas de crud

Route::any('projetos/search', 'ProjetoController@search')->name('projetos.search')->middleware('auth');
Route::put('projetos/desactive/{id}', "ProjetoController@desactive")->name("projetos.desactive")->middleware('auth');;
Route::put('projetos/active/{id}', "ProjetoController@active")->name("projetos.active")->middleware('auth');;
Route::resource("projetos", "ProjetoController")->middleware('auth');

Route::any('contatos/search', 'ContatoController@search')->name('contatos.search')->middleware('auth');
Route::put('contatos/desactive/{id}', "ContatoController@desactive")->name("contatos.desactive")->middleware('auth');;
Route::put('contatos/active/{id}', "ContatoController@active")->name("contatos.active")->middleware('auth');;
Route::resource("contatos", "ContatoController")->middleware('auth');

Route::any('habilidades/search', 'HabilidadeController@search')->name('habilidades.search')->middleware('auth');
Route::put('habilidades/desactive/{id}', "HabilidadeController@desactive")->name("habilidades.desactive")->middleware('auth');;
Route::put('habilidades/active/{id}', "HabilidadeController@active")->name("habilidades.active")->middleware('auth');;
Route::resource("habilidades", "HabilidadeController")->middleware('auth');

Route::any('sobre/search', 'SobreController@search')->name('sobre.search')->middleware('auth');
Route::put('sobre/desactive/{id}', "SobreController@desactive")->name("sobre.desactive")->middleware('auth');;
Route::put('sobre/active/{id}', "SobreController@active")->name("sobre.active")->middleware('auth');;
Route::resource("sobre", "SobreController")->middleware('auth');

Route::any('experiencia/search', 'ExperienciaController@search')->name('experiencia.search')->middleware('auth');
Route::put('experiencia/desactive/{id}', "ExperienciaController@desactive")->name("experiencia.desactive")->middleware('auth');;
Route::put('experiencia/active/{id}', "ExperienciaController@active")->name("experiencia.active")->middleware('auth');;
Route::resource("experiencia", "ExperienciaController")->middleware('auth');


Auth::routes(['register' => false]);

Route::get('/admin', 'HomeController@index')->name('admin');
