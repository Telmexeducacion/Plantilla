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



//registro: 
Route::get('/administrador', 'Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('/administrador/login', 'Auth\LoginController@login')->name('admin.login.submit');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Rutas para controlar las paginas 
Route::get('/pages','SitioController@adminIndex')->name('menu.paginas');





