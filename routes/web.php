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

//Route::get('/home', 'HomeController@index')->name('home');
// Auth::routes();

// Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::get('dashboard', function () {
    return view('admin.dashboard');
});


Route::get('/datapelamar', function () {
	return view('layouts.manage.datapelamar');
})->name('datapelamar');

Route::get('/dataloker', function () {
	return view('layouts.manage.dataloker');
})->name('dataloker');

Route::get('/profil', function () {
	return view('layouts.manage.profil');
})->name('profil');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('loginadmin', function () {
    return view('admin.loginadmin.form');
});

