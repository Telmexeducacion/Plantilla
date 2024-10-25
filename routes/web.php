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

Route::get('/', 'SitioController@welcome');



//registro:
Route::get('/administrador', 'Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('/administrador/login', 'Auth\LoginController@login')->name('admin.login.submit');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

///Rutas para Controlar las paginas y post
Route::get('/pagina/listas','PaginaController@index')->name('paginas');
Route::get('/paginas/create', 'PaginaController@create')->name('paginas.create');
Route::post('/pag', 'PaginaController@store')->name('paginas.store');
Route::delete('/paginas/{id}', 'PaginaController@destroy')->name('paginas.destroy');

//Mostrar la Pagina
Route::get('{slug}', 'PaginaController@show')->name('paginas.show');





