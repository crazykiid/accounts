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

//Route::get('/', function () {
//    return view('welcome');
//});


//Route::view('/login', 'account/login')->middleware('admin');
//Route::post('/login', 'App\Http\Controllers\AccountController@login');

Route::group(['middleware' => 'admin'], function(){
	Route::view('/login', 'account/login');
	Route::post('/login', 'App\Http\Controllers\AccountController@login');
	Route::get('/', 'App\Http\Controllers\DashboardController@index');
	Route::get('/logout', 'App\Http\Controllers\AccountController@logout');
	Route::view('/account/new', 'new_account');
	Route::post('/account/new', 'App\Http\Controllers\DashboardController@addAccount');
	Route::get('/account/all', 'App\Http\Controllers\DashboardController@viewAccounts');
	Route::get('/admin/details', 'App\Http\Controllers\DashboardController@adminDetails');
	Route::get('/admin/change-password', 'App\Http\Controllers\DashboardController@adminChangePassword');
});



