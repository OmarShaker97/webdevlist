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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', 'App\Http\Controllers\Api\AuthController@register');
Route::post('/login', 'App\Http\Controllers\Api\AuthController@login');

Route::post('/password/email', 'App\Http\Controllers\Api\ForgotPasswordController@sendResetLinkEmail');
Route::post('/password/reset', 'App\Http\Controllers\Api\ResetPasswordController@reset');

Route::get('/email/resend', 'App\Http\Controllers\Api\VerificationController@resend')->name('verification.resend');
Route::get('/email/verify/{id}/{hash}', 'App\Http\Controllers\Api\VerificationController@verify')->name('verification.verify');