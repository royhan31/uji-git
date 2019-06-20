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
  Route::get('loker','Company\LokerController@index')->name('company.loker');
  Route::get('loker/tambah','Company\LokerController@create')->name('company.loker.create');
  Route::post('loker/tambah','Company\LokerController@store')->name('company.loker.store');
  Route::get('loker/edit','Company\LokerController@edit')->name('company.loker.edit');
  Route::get('loker/detail','Company\LokerController@show')->name('company.loker.detail');

  //Data pelamar Kerja
  Route::get('daftar-pelamar-kerja','Company\UserController@jobApplicant')->name('company.jobApplicant');
  Route::get('persyaratan','Company\UserController@requirements')->name('company.requirements');

});
