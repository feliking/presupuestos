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

//Certificados

Route::get('/certificado/models', 'CertificadoController@models');
Route::get('/find/findue/{ue}', 'CertificadoController@findue');
Route::get('/find/findgast/{gast}', 'CertificadoController@findgast');
Route::get('/findnombre/{da}/{ue}/{prog}/{act}/{proy}', 'CertificadoController@findnombre');
Route::resource('certificado', 'CertificadoController');
