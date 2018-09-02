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

Route::get('/clientes', 'ClientController@index')
	->name('clients.index');
Route::get('/clientes/crear', 'ClientController@create')
	->name('clients.create');
Route::post('/clientes', 'ClientController@store')
	->name('clients.store');
Route::get('/clientes/{client}', 'ClientController@show')
	->where('id', '[0-9]+')->name('clients.show');
Route::get('/clientes/{client}/editar', 'ClientController@edit')
	->where('id', '[0-9]+')->name('clients.edit');
Route::put('/clientes/{client}', 'ClientController@update')
	->where('id', '[0-9]+')->name('clients.update');
Route::delete('/clientes/{client}', 'ClientController@destroy')
	->where('id', '[0-9]+')->name('clients.destroy');

// Quote routes

Route::get('cotizaciones', 'QuoteController@index')
	->name('quotes.index');
Route::get('/cotizaciones/crear', 'QuoteController@create')
	->name('quotes.create');
Route::post('/cotizaciones', 'QuoteController@store')
	->name('quotes.store');
Route::get('/cotizaciones/{quote}', 'QuoteController@show')
	->where('id', '[0-9]+')->name('quotes.show');
Route::get('/cotizaciones/{quote}/editar', 'QuoteController@edit')
	->where('id', '[0-9]+')->name('quotes.edit');
Route::put('/cotizaciones/{quote}', 'QuoteController@update')
	->where('id', '[0-9]+')->name('quotes.update');
Route::delete('/cotizaciones/{quote}', 'QuoteController@destroy')
	->where('id', '[0-9]+')->name('quotes.destroy');

// QuoteDetails routes

Route::get('/detalles', 'QuoteDetailsController@index')
	->name('quotedetails.index');
Route::get('/detalles/crear', 'QuoteDetailsController@create')
	->name('quotedetails.create');
Route::post('/detalles', 'QuoteDetailsController@store')
	->name('quotedetails.store');
Route::get('/detalles/{quoteDetails}', 'QuoteDetailsController@show')
	->where('id', '[0-9]+')->name('quotedetails.show');
Route::get('/detalles/{quoteDetails}/editar', 'QuoteDetailsController@edit')
	->where('id', '[0-9]+')->name('quotedetails.edit');
Route::put('/detalles/{quoteDetails}', 'QuoteDetailsController@update')
	->where('id', '[0-9]+')->name('quotedetails.update');
Route::delete('/detalles/{quoteDetails}', 'QuoteDetailsController@destroy')
	->where('id', '[0-9]+')->name('quotedetails.destroy');
