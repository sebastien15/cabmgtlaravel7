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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');
// Route::get('admin/dashboard', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');
Route::get('/schedulers/today','schedulerController@getTodaysScheduler');
// Route::get('operator/home', 'HomeController@operatorHome')->middleware('is_admin');

Route::view('/', 'ui.home');
Route::view('/about', 'ui.about');
Route::view('/contactus', 'ui.contactus');
Route::view('/terms', 'ui.terms');
Route::view('/values', 'ui.values');
Route::view('/f&q', 'ui.siteMap');
Route::view('/privacy', 'ui.privacy');
Route::view('/user/dashboard', 'ui.userPage')->name('operator.home')->middleware('auth');
Route::view('/book', 'ui.book');

//operator start

Route::view('/operator/dashboard','ui.operator.dashboard')->name('operator.home')->middleware('auth')->middleware('is_operator');
Route::view('/operator/scheduler','ui.operator.scheduler')->name('operator.scheduler')->middleware('auth')->middleware('is_operator');
Route::view('/operator/profile','ui.operator.profile')->name('operator.scheduler')->middleware('auth')->middleware('is_operator');
Route::view('/operator/location','ui.operator.location')->name('operator.location')->middleware('auth')->middleware('is_operator');

//user pages
Route::view('/user/dashboard','ui.user.dashboard')->middleware('auth');
Route::view('/user/profile','ui.user.profile')->middleware('auth');

//super admin pages
Route::view('/operator/routesAndStations','ui.admin.routesAndStations');
Route::view('/admin/car','ui.admin.car');