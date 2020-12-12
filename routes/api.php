<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\bookingController;
use App\Http\Controllers\carController;
use App\Http\Controllers\routeController;    
use App\Http\Controllers\schedulerController;    
use App\Http\Controllers\stationController;    
use App\Http\Controllers\contactController;
use App\Http\Controllers\locationController;
use App\Http\Controllers\operatorinfoController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// authentication apis
Route::post('logout', [authController::class, 'logout'])->middleware('auth');
Route::get('users', [authController::class, 'getUsers']);
Route::post('register', [authController::class, 'register']);
Route::get('users/{id}', [authController::class, 'getUser']);
Route::put('users/{id}', [authController::class, 'updateUser']);
Route::delete('users/{id}', [authController::class, 'deleteUser']);
Route::post('login', [authController::class, 'authenticate']);

// booking apis
 
Route::get('bookings', [bookingController::class, 'index']);
Route::get('bookings/{id}', [bookingController::class, 'show']);
Route::post('bookings', [bookingController::class, 'store']);
Route::put('bookings/{id}', [bookingController::class, 'update']);
Route::delete('bookings/{id}',[bookingController::class, 'destroy']);

Route::get('bookings/{id}',[bookingController::class, 'destroy']);
Route::get('bookings/{id}',[bookingController::class, 'destroy']);
Route::get('bookings/{id}',[bookingController::class, 'destroy']);

// Car routes

Route::get('cars', [carController::class, 'index']);
Route::get('cars/{id}', [carController::class, 'show']);
Route::post('cars', [carController::class, 'store']);
Route::put('cars/{id}', [carController::class, 'update']);
Route::delete('cars/{id}',[carController::class, 'destroy']);

//routes

Route::get('routes', [routeController::class, 'index']);
// Route::get('search',[routeController::class, 'searchRoutes']);
Route::get('routes/{id}', [routeController::class, 'show']);
Route::post('routes', [routeController::class, 'store']);
Route::put('routes/{id}', [routeController::class, 'update']);
Route::delete('routes/{id}',[routeController::class, 'destroy']);

//locations

Route::get('locations', [locationController::class, 'index']);
Route::get('locations/{id}', [locationController::class, 'show']);
Route::post('locations', [locationController::class, 'store']);
Route::put('locations/{id}', [locationController::class, 'update']);
Route::delete('locations/{id}',[locationController::class, 'destroy']);
Route::get('search',[locationController::class, 'searchLoc']);

// stations

Route::get('stations', [stationController::class, 'index']);
Route::get('stations/{id}', [stationController::class, 'show']);
Route::get('stationsByRouteId/{id}', [stationController::class, 'findByRouteId']);
Route::post('stations', [stationController::class, 'store']);
Route::put('stations/{id}', [stationController::class, 'update']);
Route::delete('stations/{id}',[stationController::class, 'destroy']);
Route::delete('stationDestroyByRouteId/{id}',[stationController::class, 'destroyByRouteId']);

//schedulers

Route::post('querySchedulers',[schedulerController::class, 'querySchedulers']);
Route::post('schedulers', [schedulerController::class, 'store']);
Route::get('schedulers', [schedulerController::class, 'index']);
Route::get('schedulers/{id}', [schedulerController::class, 'show']);
Route::get('schedulers/operator/{id}', [schedulerController::class, 'findByOperator']);
Route::get('schedulers/today', [schedulerController::class, 'getTodaysScheduler']);
Route::put('schedulers/{id}', [schedulerController::class, 'update']);
Route::delete('schedulers/{id}',[schedulerController::class, 'destroy']);

// contact apis

Route::get('contacts', [contactController::class, 'index']);
Route::get('contacts/{id}', [contactController::class, 'show']);
Route::post('contacts', [contactController::class, 'store']);
Route::put('contacts/{id}', [contactController::class, 'update']);
Route::delete('contacts/{id}',[contactController::class, 'destroy']);

// operator info apis

Route::get('operatorinfo', [operatorinfoController::class, 'index']);
Route::get('operatorinfo/{id}', [operatorinfoController::class, 'show']);
Route::post('operatorinfo', [operatorinfoController::class, 'store']);
Route::put('operatorinfo/{id}', [operatorinfoController::class, 'update']);
Route::delete('operatorinfo/{id}',[operatorinfoController::class, 'destroy']);
