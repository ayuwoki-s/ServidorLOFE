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
    return view('contenido/contenido');
});

//RUTAS DE LA TABLA EMOCIONES
Route::get('/emocion','EmocionController@index');
Route::post('/emocion/registrar','EmocionController@store');
Route::put('/emocion/actualizar','EmocionController@update');

//RUTAS DE LA TABLA USUARIO
Route::get('/usuario','UsuarioController@index');
Route::post('/usuario/registrar','UsuarioController@store');
Route::put('/usuario/actualizar','UsuarioController@update');