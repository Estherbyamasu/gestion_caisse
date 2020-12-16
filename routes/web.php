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

Route::get('categorie_comptes','Categorie_comptesController@index');
Route::get('categorie_comptes/create','Categorie_comptesController@create');
Route::get('categorie_comptes/edit/{categorie_compte}','Categorie_comptesController@edit');
Route::get('categorie_comptes/{categorie_compte}','Categorie_comptesController@show');
Route::post('categorie_comptes','Categorie_comptesController@store');
Route::post('categorie_comptes/storecompte','Categorie_comptesController@storecompte');
Route::get('categorie_comptes/show/{categorie_compte}','Categorie_comptesController@show'); 
Route::post('categorie_comptes/destroy/{categorie_compte}','Categorie_comptesController@destroy');
Route::put('categorie_comptes/{categorie_compte}','Categorie_comptesController@update');


Route::get('comptes','ComptesController@index');
Route::get('comptes/create','ComptesController@create');
Route::get('comptes/edit/{compte}','ComptesController@edit');
Route::get('comptes/{compte}','ComptesController@show');
Route::post('comptes','ComptesController@store');
Route::post('comptes/destroy/{compte}','ComptesController@destroy');
Route::put('comptes/{compte}','ComptesController@update');