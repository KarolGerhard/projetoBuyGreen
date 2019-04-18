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

Route::group(["prefix" => "produtos"], function () {
    Route::get('/', function () {
        return redirect('/produtos/A');
    });
    Route::get("/novo", "ProdutoController@novoView");
    Route::get("/{id}/editar", "ProdutoController@editarView");
    Route::get("/{id}/excluir", "ProdutoController@excluirView");
    Route::get("/{id}/destroy", "ProdutoController@destroy");
    Route::post("/store", "ProdutoController@store");
    Route::post("/update", "ProdutoController@update");
    Route::post("/busca", "ProdutoController@busca");
    Route::get("/{letra}", "ProdutoController@index");
});

Auth::routes();

Route::group(['middleware' => ['auth']], function(){
//   Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', function () {
    return redirect('/produtos/A');
});
});




