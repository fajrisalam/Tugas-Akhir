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

Route::get('/addkelahiran', 'DataKelahiranRsController@addIndex')->name('daftarkelahiranrs.addIndex');
Route::post('/addkelahiran', 'DataKelahiranRsController@create')->name('daftarkelahiranrs.create');

// Login RS
Route::get('/login_rs', 'AuthController@login_rs')->name('authcontroller.loginrs');

Route::get('/','LahirController@index');
Route::get('daftarlahir','LahirController@daftarLahir');
Route::post('daftarlahir','LahirController@inputLahir');
Route::get('monitoringlahir','LahirController@monitoringLahir');
Route::get('bantuanlahir','LahirController@bantuanLahir');

Route::get('daftarrs','LahirController@daftarRS');
