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

  /* Rutas de Estudiantes */

  Route::get('Estudiante','estudiantesController@MostrarEstudiante')->name('Estudiante');
  Route::post('ListStudents', 'estudiantesController@List')->name('ListStudents');
  