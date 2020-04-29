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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@dashboard')->name('admin.dashboard');

Route::get('/index', 'ServiciosController@index')->name('servicios.index');
Route::resource('/admin/servicios','ServiciosController');


Route::get('/admin/index', 'UsuariosController@index')->name('admin.index');
