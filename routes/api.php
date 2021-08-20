<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\BusSeatsController;
use App\Http\Controllers\BusSheduleController;
use App\Http\Controllers\BusRoutesController;
use App\Http\Controllers\BusScheduleBookingController;


//Route::middleware('auth:api')->get('/user', function (Request $request) {
  //  return $request->user();
//});

Route::middleware('auth:sanctum')->group(function() {

    Route::get("/user",'App\Http\Controllers\SuperAdminController@userdata') -> name('SuperAdmin.api');
});

Route::post("login",[UserController::class,'login']);
Route::post('/user-create',[UserController::class,'create']);
Route::post("login-admin",[SuperAdminController::class,'login']);
Route::post('/super_admin-create',[SuperAdminController::class,'create']);


Route::post('/bus/add',[BusController::class,'create']);//bus route is set with the post to add data
Route::get('buses',[BusController::class,'index']);//route to retrieve data
Route::get('/buses/{id}/show',[BusController::class,'show']);//route to retrieve data from the specific id
Route::put('/buses/{id}/update',[BusController::class,'update']);//route to update data using id
Route::delete('/buses/{id}/delete',[BusController::class,'delete']);//route to delete data using id

Route::post('route/add',[RouteController::class,'createRoute']);
Route::get('routes',[RouteController::class,'indexRoute']);
Route::get('/routes/{id}/showRoute',[RouteController::class,'showRoute']);
Route::put('/routes/{id}/updateRoute',[RouteController::class,'updateRoute']);
Route::delete('/routes/{id}/deleteRoute',[RouteController::class,'deleteRoute']);

Route::post('bus_seats/add',[BusSeatsController::class,'create']);
Route::get('bus_seats',[BusSeatsController::class,'index']);
Route::get('/bus_seats/{id}/show',[BusSeatsController::class,'show']);
Route::put('/bus_seats/{id}/update',[BusSeatsController::class,'update']);
Route::delete('/bus_seats/{id}/delete',[BusSeatsController::class,'delete']);

Route::post('/bus_shedule/add',[BusSheduleController::class,'create']);
Route::get('bus_shedules',[BusSheduleController::class,'index']);
Route::get('/bus_shedules/{id}/show',[BusSheduleController::class,'show']);
Route::put('/bus_shedules/{id}/update',[BusSheduleController::class,'update']);
Route::delete('/bus_shedules/{id}/delete',[BusSheduleController::class,'delete']);

Route::post('/bus_routes/add',[BusRoutesController::class,'create']);
Route::get('bus_routes',[BusRoutesController::class,'index']);
Route::get('/bus_routes/{id}/show',[BusRoutesController::class,'show']);
Route::put('/bus_routes/{id}/update',[BusRoutesController::class,'update']);
Route::delete('/bus_routes/{id}/delete',[BusRoutesController::class,'delete']);

Route::post('/bus_schedule_bookings/add',[BusScheduleBookingController::class,'create']);
Route::get('bus_schedule_bookings',[BusScheduleBookingController::class,'index']);
Route::get('/bus_schedule_bookings/{id}/show',[BusScheduleBookingController::class,'show']);
Route::put('/bus_schedule_bookings/{id}/update',[BusScheduleBookingController::class,'update']);
Route::delete('/bus_schedule_bookings/{id}/delete',[BusScheduleBookingController::class,'delete']);

Route::post('password/email','PasswordResetController@forgot');
Route::post('password/email','PasswordResetController@reset');
