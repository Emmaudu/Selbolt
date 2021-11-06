<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('v1')->group(function(){
    Route::post('/transaction/webhook', [App\Http\Controllers\WebhookController::class, 'transaction']);
});

Route::post('save-payment/details', [App\Http\Controllers\v1\TransactionController::class, 'savePaymentDetails']);
Route::get('/receivers', [App\Http\Controllers\ConnectionController::class, 'receivers']);

Route::post('/send-message', [App\Http\Controllers\ConnectionController::class, 'sendMessage']);
Route::get('/messages/{receiverId}', [App\Http\Controllers\ConnectionController::class, 'messages']);
Route::get('user', [App\Http\Controllers\ConnectionController::class, 'user']);

Route::post('publish/messages', [App\Http\Controllers\ConnectionController::class, 'sendMessage']);

Route::post('/upload', [App\Http\Controllers\ConnectionController::class, 'uploadFile']);