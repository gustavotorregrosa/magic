<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/pagina-inicial', 'ApresentacaoController@inicial');

Route::get('/logout', 'Auth\LoginController@logout');

Route::post('/cria-carta', 'CartaController@criar');

Route::post('/deleta-carta', 'CartaController@deletar');

Route::get('/edita-carta/{id}', 'CartaController@paineleditar');

Route::post('/atualizar-carta', 'CartaController@atualizar');