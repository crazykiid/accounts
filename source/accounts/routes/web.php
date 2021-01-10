<?php

use Illuminate\Support\Facades\Route;

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
// php artisan make:controller AccountController

Route::group(['middleware' => 'admin'], function(){
	Route::view('/login', 'login');
	Route::post('/login', 'App\Http\Controllers\AdminAcController@login');
	Route::view('/', 'dashboard');
	Route::view('/about', 'about');
	Route::get('/logout', 'App\Http\Controllers\AdminAcController@logout');

	Route::view('/accounts/new', 'accounts.create');
	Route::post('/accounts/new', 'App\Http\Controllers\UserAcController@createUserAc');
	Route::get('/accounts/all', 'App\Http\Controllers\UserAcController@usersAll');
	Route::get('/accounts/lock/{id}', 'App\Http\Controllers\UserAcController@lockUserAc');
	Route::get('/accounts/unlock/{id}', 'App\Http\Controllers\UserAcController@unlockUserAc');
	Route::get('/accounts/suspend/{id}', 'App\Http\Controllers\UserAcController@suspendUserAc');

	Route::view('/admin/change-password', 'admin.change_password');
});



