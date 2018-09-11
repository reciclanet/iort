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

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::get('/personas', 'PersonaController@index');
Route::get('/personas/create', 'PersonaController@create');
Route::post('/personas', 'PersonaController@store');
Route::get('/personas/{persona}', 'PersonaController@show');
Route::get('/personas/{persona}/edit', 'PersonaController@edit');
Route::patch('/personas/{persona}', 'PersonaController@update');
Route::delete('/personas/{persona}', 'PersonaController@destroy');

Route::get('/organizaciones', 'OrganizacionController@index');
Route::get('/organizaciones/create', 'OrganizacionController@create');
Route::post('/organizaciones', 'OrganizacionController@store');
Route::get('/organizaciones/{organizacion}', 'OrganizacionController@show');
Route::get('/organizaciones/{organizacion}/edit', 'OrganizacionController@edit');
Route::patch('/organizaciones/{organizacion}', 'OrganizacionController@update');
Route::delete('/organizaciones/{organizacion}', 'OrganizacionController@destroy');
Route::get('/colaboradores', 'OrganizacionController@colaboradores');

Route::get('/datatables/personas', 'PersonaController@getData');
Route::get('/datatables/organizaciones', 'OrganizacionController@getData');

Route::get('/lotes', 'LoteController@index');
Route::get('/lotes/create', 'LoteController@create');
Route::post('/lotes', 'LoteController@store');
Route::get('/lotes/{lote}', 'LoteController@show');
Route::get('/lotes/{lote}/informe', 'LoteController@showInforme');
Route::get('/lotes/{lote}/edit', 'LoteController@edit');
Route::patch('/lotes/{lote}', 'LoteController@update');

Route::post('/loteMateriales', 'LoteMaterialController@store');
Route::delete('/loteMateriales/{loteMaterial}', 'LoteMaterialController@destroy');

Route::get('/labels/', 'LabelController@index');
Route::post('/labels/', 'LabelController@index');
Route::get('/labels/export', 'LabelController@export');

Route::get('/txaes/', 'TxaeController@index');
Route::get('/txaes/edit', 'TxaeController@edit');
Route::patch('/txaes', 'TxaeController@update');

Route::get('/informes/', 'InformeController@index');
Route::get('/informes/{informe}', 'InformeController@show');
