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

Route::get('/', "LivreController@index");
Route::get('/livres', "LivreController@index");
Route::any('/search',"LivreController@search");
Route::any("/searchA", "AuteurController@search_auteur");
Route::any("/searchF", "FormatController@searchF");
Auth::routes();
Route::any('/detail', "LivreController@detail");
Route::get('/home', 'HomeController@index')->name('home');
