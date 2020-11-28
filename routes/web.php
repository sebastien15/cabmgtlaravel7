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
Route::get('operator/home', 'HomeController@operatorHome')->name('operator.home')->middleware('is_admin');

Route::view('/', 'ui.home');
Route::view('/about', 'ui.about');
Route::view('/contactus', 'ui.contactus');
Route::view('/offers', 'ui.offers');
Route::view('/values', 'ui.values');
Route::view('/siteMap', 'ui.siteMap');
Route::view('/book', 'ui.book');

//operator start

Route::view('/operator/dashboard','ui.operator.dashboard');

//super admin pages
Route::view('/operator/routesAndStations','ui.admin.routesAndStations');
Route::view('/admin/car','ui.admin.car');
