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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/files', 'FileController@index')->name('myfile');
Route::get('files/{id}', 'FileController@Download')->name('download');
Route::get('/upload', 'FileController@formUpload')->name('upload');
Route::post('upload', 'FileController@upload')->name('upload');
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
