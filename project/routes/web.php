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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/dashboard', 'UserController@index')->name('dashboard');

Route::get('/devis/create', 'DevisController@index')->name('devis.create');
Route::post('/devis/create', 'DevisController@store')->name('devis.store');

Auth::routes();
