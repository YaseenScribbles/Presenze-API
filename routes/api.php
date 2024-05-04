<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckInController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GeocodingController;
use App\Http\Controllers\VisitController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/checkin', [CheckInController::class, 'store']);
Route::get('/checkin', [CheckInController::class, 'index']);
Route::post('/checkout', [CheckOutController::class, 'store']);
Route::get('/checkout', [CheckOutController::class, 'index']);
Route::post('/login',[AuthController::class,'login']);
Route::post('/logout',[AuthController::class,'logout']);
Route::get('/geocode',[GeocodingController::class,'geocode']);
Route::apiResource('contacts',ContactController::class);
Route::apiResource('visits',VisitController::class);

