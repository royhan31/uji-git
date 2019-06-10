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
  Route::get('/olahdataperusahaan','Admin\OlahDataPerusahaanController@index')->name('admin.dashboard.olahdataperusahaan');
});

Route::group(['prefix' => '/'], function(){
  Route::get('login','Company\AuthCompanyController@showLoginForm')->name('login');
  Route::post('login','Company\AuthCompanyController@login')->name('company.login');
  Route::get('register','Company\AuthCompanyController@showRegisterForm')->name('register');
  Route::post('register','Company\AuthCompanyController@register')->name('company.register');
  Route::post('logout','Company\AuthCompanyController@logoutCompany')->name('company.logout');
  Route::get('beranda','Company\CompanyController@index')->name('company.dashboard');
  Route::get('profil','Company\CompanyController@profile')->name('company.profile');
  Route::patch('profile/{company}','Company\CompanyController@updateProfile')->name('company.profile.update');
  //crud loker
  Route::get('loker','Company\DataLokerController@index')->name('company.dashboard.dataloker');
  Route::get('loker/tambah','Company\DataLokerController@create')->name('loker.create');
  Route::post('loker/tambah','Company\DataLokerController@store')->name('loker.store');



});
