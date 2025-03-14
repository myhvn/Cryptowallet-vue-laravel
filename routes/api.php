<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WalletController;
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


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('/deduct',[WalletController::class, 'deduct'])->middleware('auth:sanctum');
Route::post('/cashout',[WalletController::class, 'cashout'])->middleware('auth:sanctum');
Route::get('/get-wallet-status',[WalletController::class, 'status']);

Route::get('/test', [AuthController::class, 'me'])->middleware('auth:sanctum');


