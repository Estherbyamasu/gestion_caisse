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

Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('users','UsersController');
});


Route::get('caisse_utilisateurs','Caisse_utilisateursController@index');
Route::get('caisse_utilisateurs/create','Caisse_utilisateursController@create');
Route::post('caisse_utilisateurs','Caisse_utilisateursController@store');
Route::get('caisse_utilisateurs/edit/{caisse_utilisateur}','Caisse_utilisateursController@edit');
Route::put('caisse_utilisateurs/{caisse_utilisateur}','Caisse_utilisateursController@update');
Route::post('caisse_utilisateurs/destroy/{caisse_utilisateur}','Caisse_utilisateursController@destroy');

Route::get('guichets','GuichetsController@index');
Route::get('guichets/create','GuichetsController@create');
Route::post('guichets','GuichetsController@store');
Route::get('guichets/edit/{guichet}','GuichetsController@edit');
Route::get('guichets/show/{guichet}','GuichetsController@show');
Route::put('guichets/{guichet}','GuichetsController@update');
Route::post('guichets/destroy/{guichet}','GuichetsController@destroy');

Route::get('caisses','CaissesController@index');
Route::get('caisses/create','CaissesController@create');
Route::post('caisses','CaissesController@store');
Route::get('caisses/edit/{caisse}','CaissesController@edit');
Route::put('caisses/{caisse}','CaissesController@update');
Route::post('caisses/destroy/{caisse}','CaissesController@destroy');

