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
    return view('auth.login');
});

#Ruta hacía el INDEX HOME
Route::get('/Alumnos','\App\Http\Controllers\AlumnosController@index');

#Ruta hacia la modificacion de alumnos
Route::get('/Alumnos/edit','\App\Http\Controllers\AlumnosController@edit');

#Ruta hacia el formulario de alumnos
Route::get('/Alumnos/createAlumnos','\App\Http\Controllers\AlumnosController@create');

#General
Route::resource('Alumnos', '\App\Http\Controllers\AlumnosController');

#Creamos este seguriad para que no puedan ingresar al fomrulario sin inciicar sesion primero
Route::resource('Alumnos',\App\Http\Controllers\AlumnosController::class)->middleware('auth');
Auth::routes();

#Cuando se logee lo dirigimos a la lista de alumnos.
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=> 'auth'], function (){
    Route::get('/home', [\App\Http\Controllers\AlumnosController::class, 'index'])->name('home');
});
