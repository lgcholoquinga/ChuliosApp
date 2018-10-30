<?php
Route::get('/', function () {
    return view('welcome');
});

Route::resource('usuario','UsuarioController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('bus','BusController');
