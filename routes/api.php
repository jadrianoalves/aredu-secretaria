<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PasswordResetRequestController;
use App\Http\Controllers\ChangeUserPasswordController;
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

Route::post('login', [AuthController::class, 'authenticate']);
Route::post('send-password-reset', [PasswordResetRequestController::class, 'sendPasswordResetEmail']);
Route::get('reset-password',[ChangeUserPasswordController::class, 'ResetPasswordPage']);
Route::post('change-password',[ChangeUserPasswordController::class,'passwordResetProcess']);

Route::get('/schools',[SchoolController::class, 'index']);

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('get-user', [AuthController::class, 'getCurrentUser']);
    Route::get('get-user-schools', [AuthController::class, 'getUserSchools']);
});

Route::group([
    'middleware' => ['jwt.verify'],
    'prefix' => 'user'
], function (){
    
    Route::get('/get-schools', [UserController::class, 'getSchools']);
    Route::post('/attach-school', [UserController::class, 'attachSchool']);
    Route::post('/detach-school', [UserController::class, 'detachSchool']);
    Route::post('/block-user', [UserController::class, 'blockUser']);
    Route::post('register-admin', [UserController::class, 'createAdmin']);
    

    
});

Route::group([
    'middleware' => ['jwt.verify'],
    'prefix' => 'schools'
], function (){
    
    Route::get('/', [SchoolController::class, 'index']);
    Route::post('/', [SchoolController::class, 'store']);
    
    

    
});
