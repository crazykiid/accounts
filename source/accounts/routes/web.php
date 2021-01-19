<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// php artisan make:controller AccountController

Route::group(['middleware' => 'admin'], function(){
	Route::view('/login', 'login');
	Route::post('/login', 'App\Http\Controllers\AdminAcController@login');
	//Route::view('/', 'dashboard');
	Route::get('/', 'App\Http\Controllers\DashboardController@dashboard');
	Route::view('/about', 'about');
	Route::get('/logout', 'App\Http\Controllers\AdminAcController@logout');
	Route::view('/admin/change-password', 'admin.change_password');
	Route::post('/admin/change-password', 'App\Http\Controllers\AdminAcController@updatePass');

	Route::view('/accounts/new', 'accounts.create');
	Route::post('/accounts/new', 'App\Http\Controllers\UserAcController@createUserAc');
	Route::get('/accounts/all', 'App\Http\Controllers\UserAcController@usersAll');
	Route::get('/accounts/active', 'App\Http\Controllers\UserAcController@usersAct');
	Route::get('/accounts/inactive', 'App\Http\Controllers\UserAcController@usersDct');
	Route::get('/accounts/suspended', 'App\Http\Controllers\UserAcController@usersSus');

	Route::get('/accounts/update/{id}', 'App\Http\Controllers\UserAcController@editBasicUserAc');
	Route::post('/accounts/update/{id}', 'App\Http\Controllers\UserAcController@updateBasicUserAc');
	Route::post('/accounts/update/{id}/password', 'App\Http\Controllers\UserAcController@updatePassUserAc');

	Route::get('/accounts/lock/{id}', 'App\Http\Controllers\UserAcController@lockUserAc');
	Route::get('/accounts/unlock/{id}', 'App\Http\Controllers\UserAcController@unlockUserAc');
	Route::get('/accounts/suspend/{id}', 'App\Http\Controllers\UserAcController@suspendUserAc');
	Route::get('/accounts/activate/{id}', 'App\Http\Controllers\UserAcController@activateUserAc');
	Route::post('/accounts/search', 'App\Http\Controllers\UserAcController@searchUserAc');
});



