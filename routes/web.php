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
Route::get('email/verifikasi/{id}', 'Company\VerificationCompanyController@verify')->name('verificationCompany.verify');

Route::group(['prefix' => 'admin'], function(){
  Route::get('/login', 'Admin\AuthAdminController@showLoginForm')->name('admin.login');
  Route::post('/login','Admin\AuthAdminController@login')->name('admin.get.login');
  Route::post('logout','Admin\AuthAdminController@logoutAdmin')->name('admin.logout');
  Route::get('/beranda','Admin\AdminsController@index')->name('admin.dashboard');
  Route::get('/perusahaan','Admin\CompanyController@index')->name('admin.company');
  Route::get('/notif/{notification}','Admin\AdminsController@showNotif')->name('admin.notification');
  Route::post('/perusahaan/{company}','Admin\CompanyController@update')->name('admin.company.update');
  Route::get('/pengguna','Admin\UserController@index')->name('admin.user');
  Route::post('/pengguna/{user}','Admin\UserController@update')->name('admin.user.update');
  Route::get('/pengguna','Admin\UserController@index')->name('admin.user');
  Route::get('/pengguna/{user}','Admin\UserController@show')->name('admin.user.show');
  Route::patch('/pengguna/{user}','Admin\UserController@confirm')->name('admin.user.confirm');
  Route::get('/pertanyaan','Admin\QuestionController@index')->name('admin.question');
  Route::post('/pertanyaan','Admin\QuestionController@store')->name('admin.question.store');
  Route::patch('/pertanyaan/{question}','Admin\QuestionController@update')->name('admin.question.update');
  Route::post('/pertanyaan/{question}','Admin\QuestionController@destroy')->name('admin.question.destroy');
  Route::get('/loker','Admin\AdminsController@loker')->name('admin.loker');
  Route::get('riwayat','Admin\AdminsController@history')->name('admin.history');
});

Route::group(['prefix' => '/'], function(){
  Route::get('login','Company\AuthCompanyController@showLoginForm')->name('login');
  Route::post('login','Company\AuthCompanyController@login')->name('company.login');
  Route::get('register','Company\AuthCompanyController@showRegisterForm')->name('register');
  Route::post('register','Company\AuthCompanyController@register')->name('company.register');
  Route::post('logout','Company\AuthCompanyController@logoutCompany')->name('company.logout');
  Route::get('beranda','Company\CompanyController@index')->name('company.dashboard');
  Route::get('profil','Company\CompanyController@profile')->name('company.profile');
  Route::post('profil','Company\CompanyController@resetPassword')->name('company.reset.password');
  Route::patch('profile/{company}','Company\CompanyController@updateProfile')->name('company.profile.update');
  //crud loker
  Route::get('loker','Company\LokerController@index')->name('company.loker');
  Route::get('loker/tambah','Company\LokerController@create')->name('company.loker.create');
  Route::post('loker/tambah','Company\LokerController@store')->name('company.loker.store');
  Route::get('loker/edit/{loker}','Company\LokerController@edit')->name('company.loker.edit');
  Route::patch('loker/edit/{loker}','Company\LokerController@update')->name('company.loker.update');
  Route::get('loker/detail/{loker}','Company\LokerController@show')->name('company.loker.detail');
  Route::post('loker/hapus/{loker}','Company\LokerController@destroy')->name('company.loker.destroy');
  //Notifikasi
  Route::get('notification/{notification}','Company\CompanyController@notif')->name('company.notification');
  //Data pelamar Kerja
  Route::get('daftar-pelamar-kerja','Company\UserController@jobApplicant')->name('company.jobApplicant');
  Route::get('daftar-pelamar-kerja/diterima','Company\UserController@jobApplicantAccept')->name('company.jobApplicantAccept');
  Route::get('daftar-pelamar-kerja/ditolak','Company\UserController@jobApplicantDenied')->name('company.jobApplicantDenied');
  Route::patch('daftar-pelamar-kerja/terima/{registration}','Company\UserController@accept')->name('company.jobApplicant.accept');
  Route::patch('daftar-pelamar-kerja/tolak/{registration}','Company\UserController@denied')->name('company.jobApplicant.denied');

  Route::get('riwayat','Company\CompanyController@history')->name('company.history');

});
