<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/registros','RegistroController@index')->name('listado_alumnos');
Route::get('/registros/nuevo','RegistroController@create');
Route::post('/registros/guardar','RegistroController@store')->name('guardar_alumno');
Route::get('/registros/editar/{id}','RegistroController@edit')->name('editar_alumno');
Route::put('/registros/actualizar/{id}','RegistroController@update')->name('actualizar_alumno');