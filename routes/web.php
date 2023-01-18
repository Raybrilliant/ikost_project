<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;
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

Route::get('/', [PaymentController::class,'showById']);
Route::get('/login', [LoginController::class,'index']);
Route::post('/login', [LoginController::class,'login']);
Route::post('/upload', [PaymentController::class,'storeImage']);
Route::get('/logout', [LoginController::class,'logout']);

Route::prefix('admin')->group(function(){
    Route::get('/', [PaymentController::class,'show']);
    Route::get('/login', [LoginController::class,'indexAdmin']);
    Route::post('/login', [LoginController::class,'loginAdmin']);
    Route::prefix('history')->group(function(){
        Route::get('/', [PaymentController::class,'showHistory']);
        Route::get('/delete', [PaymentController::class,'deleteHistory']);
    });
    Route::get('/update', [PaymentController::class,'updateStatus']);
    Route::prefix('customer')->group(function(){
        Route::get('/', [CustomerController::class, 'show']);
        Route::post('/input', [CustomerController::class, 'store']);
        Route::get('/delete', [CustomerController::class, 'delete']);
        Route::get('/send', [PaymentController::class, 'sendPayment']);
    });
    Route::get('/login', function () {
        return view('admin/login');
    });
});
