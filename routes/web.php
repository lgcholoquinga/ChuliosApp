<?php
Route::get('/', function () {
    return view('welcome');
});

Route::resource('usuario','UsuarioController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('bus','BusController');
Route::get("bus/{bus}/qrbus",'BusController@qrbus')->name('bus.qrbus');
Route::post("bus/storeqr",'BusController@storeqr')->name('bus.storeqr');
Route::get('createqr','BusController@createqr')->name('createqr');
Route::post('/bus/postqr','BusController@postqr')->name('bus.postqr');
Route::get('listar_buses/{page?}','BusController@listar_buses');