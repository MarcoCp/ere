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

// Clients routes

Route::get('/clientes', 'ClientController@index')->name('clients.index');
Route::get('/clientes/crear', 'ClientController@create')->name('clients.create');
Route::post('/clientes', 'ClientController@store')->name('clients.store');
Route::get('/clientes/{client}', 'ClientController@show')->name('clients.show');
Route::get('/clientes/{client}/editar', 'ClientController@edit')->name('clients.edit');
Route::put('/clientes/{client}', 'ClientController@update')->name('clients.update');
Route::delete('/clientes/{client}', 'ClientController@destroy')->name('clients.destroy');
