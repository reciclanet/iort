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

Route::get('/about', function () {
    return view('welcome');
});
Route::get('/informe', function () {
    return view('template.informe');
});

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::get('/personas', 'PersonasController@index');
Route::get('/personas/create', 'PersonasController@create');
Route::post('/personas', 'PersonasController@store');
Route::get('/personas/{persona}', 'PersonasController@show');
Route::get('/personas/{persona}/edit', 'PersonasController@edit');
Route::patch('/personas/{persona}', 'PersonasController@update');
Route::delete('/personas/{persona}', 'PersonasController@destroy');

Route::get('/organizaciones', 'OrganizacionesController@index');
Route::get('/organizaciones/create', 'OrganizacionesController@create');
Route::post('/organizaciones', 'OrganizacionesController@store');
Route::get('/organizaciones/{organizacion}', 'OrganizacionesController@show');
Route::get('/organizaciones/{organizacion}/edit', 'OrganizacionesController@edit');
Route::patch('/organizaciones/{organizacion}', 'OrganizacionesController@update');
Route::delete('/organizaciones/{organizacion}', 'OrganizacionesController@destroy');

Route::post('/lotes/{tipo}/{id}', 'LoteController@store');
Route::get('/lotes/{lote}', 'LoteController@show');
Route::get('/lotes/{lote}/edit', 'LoteController@edit');
Route::patch('/lotes/{lote}', 'LoteController@update');
