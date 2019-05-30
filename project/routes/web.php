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

Route::get('/template-devis', 'HomeController@devis')->name('templates.devisTemplate');

Route::get('/template-facture', 'HomeController@facture')->name('templates.factureTemplate');

Route::get('/devis/validate/{id}', 'DevisController@sign')->name('devis.validate');

Route::get('/dossiers/all', 'DossierController@index')->name('dossiers');

Auth::routes();
