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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'App\Http\Controllers\DashboardController@index');
Route::get('/account/new', 'App\Http\Controllers\DashboardController@addAccount');
Route::get('/account/all', 'App\Http\Controllers\DashboardController@viewAccounts');
Route::get('/admin/details', 'App\Http\Controllers\DashboardController@adminDetails');
Route::get('/admin/change-password', 'App\Http\Controllers\DashboardController@adminChangePassword');