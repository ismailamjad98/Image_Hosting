<?php

use App\Http\Controllers\AccessImageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UploadImageCotroller;

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

Route::post("forget_password", [ResetPasswordController::class, "forgetPassword"]);
Route::post("reset_password/{token}/{email}", [ResetPasswordController::class, "resetPassword"]);
