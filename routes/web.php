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
    return "Home site com fotos e carrosel";
});

// Route::get('/produtos', 'ProdutoController@lista');
Route::get('/produtos', [
'as' => 'listar',
'uses' => 'ProdutoController@lista'
]);

Route::get('/produtos/mostra/{id}', 'ProdutoController@mostra')
->where('id', '[0-9]+');


 
//Route::get('/produtos/novo', 'ProdutoController@novo');
Route::get('/produtos/novo', [
'as' => 'novo',
'uses' => 'ProdutoController@novo'
]);

Route::get('/produtos/remove/{id}', 'ProdutoController@remove')
->where('id', '[0-9]+');

// Route::get('/produtos/remove/{id}', [
// 'as' => 'remove',
// 'uses' => 'ProdutoController@remove'
// ])->where('id', '[0-9]+');

 
Route::post('/produtos/adiciona','ProdutoController@adiciona');


Route::get('/produtos/json', [
'as' => 'json',
'uses' => 'ProdutoController@listaJson'
]);