<?php

use App\Http\Controllers\AccessImageController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Friend_Request;
use App\Http\Controllers\ResetController;
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

//User Routes
Route::post('/register', [UserController::class , 'register']);
Route::post('/login', [UserController::class , 'login']);
Route::get('emailVerify/{token}/{email}', [UserController::class , 'EmailVerify']);

//User Routes with middleware
Route::middleware(['token'])->group(function () {
    //User Routes
    Route::post('/profile/update/{id}', [UserController::class , 'update']);
    Route::post('/logout', [UserController::class , 'logout']);
});

Route::post('/upload_image', [UploadImageCotroller::class , 'uploadImage']);
Route::post('/delete_image/{id}', [UploadImageCotroller::class , 'deleteImage']);
// Route::post('/rename/{id}', [UploadImageCotroller::class , 'renameImage']);
Route::post('/my_images', [UploadImageCotroller::class , 'myImages']);
Route::post('/search/{image}', [UploadImageCotroller::class , 'searchImage']);

Route::post("forget_password", [ResetPasswordController::class, "forgetPassword"]);
Route::post("reset_password/{token}/{email}", [ResetPasswordController::class, "resetPassword"]);


//Image Routes with middleware
Route::middleware(['token'])->group(function () {
    //User Routes
    Route::post('/image_permission', [AccessImageController::class , 'givePermission']);
    Route::get('/view_image', [AccessImageController::class , 'ViewImage']);
});

