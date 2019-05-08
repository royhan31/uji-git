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

Route::group(['prefix' => 'admin'], function(){
  Route::get('/login', 'Admin\AuthAdminController@showLoginForm')->name('admin.login');
  Route::post('/login','Admin\AuthAdminController@login')->name('admin.get.login');
  Route::post('logout','Admin\AuthAdminController@logoutAdmin')->name('admin.logout');
  Route::get('/dashboard','Admin\AdminsController@index')->name('admin.dashboard');
});

Route::group(['prefix' => '/'], function(){
  Route::get('login','Company\AuthCompanyController@showLoginForm')->name('login');
  Route::post('login','Company\AuthCompanyController@login')->name('company.login');
  Route::get('register','Company\AuthCompanyController@showRegisterForm')->name('register');
  Route::post('register','Company\AuthCompanyController@register')->name('company.register');
  Route::post('logout','Company\AuthCompanyController@logoutCompany')->name('company.logout');
  Route::get('dashboard','Company\CompanyController@index')->name('company.dashboard');
});
