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

//Route::get('/Chulio', 'ChulioController@index');
Auth::routes();

Route::resource('/Chulio', 'ChulioController');

//Route::get('/Chulio/create','ChulioController@create');

Route::get('/recarga', 'RecargaController@index');
