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
    return redirect()->route('home');
});
Auth::routes();


//home
Route::get('/home', 'HomeController@index')->name('home');
//file
Route::get('/files', 'FileController@index')->name('myfile');
Route::get('files/{id}', 'FileController@Download')->name('download');
Route::get('/upload', 'FileController@formUpload')->name('upload');
Route::post('upload', 'FileController@upload')->name('upload');
//share
Route::get('/share', 'SharingController@index')->name('share');
Route::get('/share/form/{id}', 'SharingController@form')->name('share_form');
Route::post('/share/form/', 'SharingController@update_share')->name('share_update');
//log
Route::get('/log', 'LogController@index')->name('log');