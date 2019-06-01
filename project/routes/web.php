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



Route::get('/template-devis', 'DevisTemplateController@index', function (){

})->name('templates.devisTemplate');

Route::get('/template-facture', 'HomeController@facture')->name('templates.factureTemplate');


Route::group(['prefix' => '/facture'], function (){
    Route::get('/generate/{id}', 'FactureController@index')->name('facture.generate');
    Route::post('/generate/{id}', 'FactureController@store')->name('facture.create');
    Route::get('/close/{id}', 'DossierController@close')->name('facture.close');
});


Route::get('/dossiers/all', 'DossierController@index')->name('dossiers');

Route::group(['prefix' => '/devis'], function () {
    Route::get('/create', 'DevisController@index')->name('devis.create');
    Route::post('/create', 'DevisController@store')->name('devis.store');
    Route::get('/validate/{id}', 'DevisController@sign')->name('devis.validate');
});

Auth::routes();
