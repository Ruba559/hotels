<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\RegionController;
use App\Http\Controllers\Api\v1\CategoryController;
use App\Http\Controllers\Api\v1\BookingController;
use App\Http\Controllers\Api\v1\HotelController;
use App\Http\Controllers\Api\v1\OfferController;
use App\Http\Controllers\Api\v1\RateController;
use App\Http\Controllers\Api\v1\RoomController;
use App\Http\Controllers\Api\v1\ServiceController;
use App\Http\Controllers\Api\v1\UserController;
use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\RateUserController;


Route::post('login', [AuthController::class ,'login']);
Route::post('register', [AuthController::class ,'register']);

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('/logout', [AuthController::class, 'logout']);


Route::get('/region', [RegionController::class,'index']);
Route::post('/region', [RegionController::class,'store']);
Route::post('/region/{id}', [RegionController::class,'update']);
Route::delete('/region/{id}', [RegionController::class,'destroy']);

Route::get('/category', [CategoryController::class,'index']);
Route::post('/category', [CategoryController::class,'store']);
Route::post('/category/{id}', [CategoryController::class,'update']);
Route::delete('/category/{id}', [CategoryController::class,'destroy']);

Route::get('/booking', [BookingController::class,'index']);
Route::post('/booking', [BookingController::class,'store']);
Route::post('/booking/{id}', [BookingController::class,'update']);
Route::delete('/booking/{id}', [BookingController::class,'destroy']);

Route::get('/hotel', [HotelController::class,'index']);
Route::post('/hotel', [HotelController::class,'store']);
Route::post('/hotel/{id}', [HotelController::class,'update']);
Route::delete('/hotel/{id}', [HotelController::class,'destroy']);

Route::get('/offer', [OfferController::class,'index']);
Route::post('/offer', [OfferController::class,'store']);
Route::post('/offer/{id}', [OfferController::class,'update']);
Route::delete('/offer/{id}', [OfferController::class,'destroy']);

Route::get('/rate', [RateController::class,'index']);
Route::post('/rate', [RateController::class,'store']);
Route::post('/rate/{id}', [RateController::class,'update']);
Route::delete('/rate/{id}', [RateController::class,'destroy']);

Route::get('/room', [RoomController::class,'index']);
Route::post('/room', [RoomController::class,'store']);
Route::post('/room/{id}', [RoomController::class,'update']);
Route::delete('/room/{id}', [RoomController::class,'destroy']);

Route::get('/service', [ServiceController::class,'index']);
Route::post('/service', [ServiceController::class,'store']);
Route::post('/service/{id}', [ServiceController::class,'update']);
Route::delete('/service/{id}', [ServiceController::class,'destroy']);

Route::get('/user', [UserController::class,'index']);
Route::post('/user', [UserController::class,'store']);
Route::post('/user/{id}', [UserController::class,'update']);
Route::delete('/user/{id}', [UserController::class,'destroy']);

Route::get('/rate_user', [RateUserController::class,'index']);
Route::post('/rate_user', [RateUserController::class,'store']);
Route::post('/rate_user/{id}', [RateUserController::class,'update']);
Route::delete('/rate_user/{id}', [RateUserController::class,'destroy']);

});