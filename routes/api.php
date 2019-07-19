<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::get('loker','API\LokerConroller@index');
Route::post('user/register','API\UserController@register');
Route::post('user/login','API\UserController@login');
Route::post('user/registration','API\RegistrationController@userRegistration')->middleware('auth:api');
Route::get('user/profile','API\UserController@show')->middleware('auth:api');
Route::get('user/logout','API\UserController@logout')->middleware('auth:api');
Route::get('user/loker','API\UserController@userLoker')->middleware('auth:api');
Route::post('user/update','API\UserController@update')->middleware('auth:api');
Route::get('company','API\CompanyController@index');
Route::get('company/{id}','API\CompanyController@companyLoker');
Route::get('loker','API\LokerController@index');
Route::get('loker/{id}','API\LokerController@details');
Route::post('loker/search','API\LokerController@search');
