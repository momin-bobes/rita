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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/employee/create', function() {
  return view('users.new');
});
Route::get('/employee/all', 'UserController@index');
Route::post('/employee/store', 'UserController@store');
Route::post('/employee/{id}/update', 'UserController@update');
Route::get('/employee/{id}/edit', 'UserController@edit');
Route::get('/employee/{id}/delete', 'UserController@delete');
Route::post('/employee/search', 'UserController@search');
