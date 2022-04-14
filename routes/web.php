<?php

use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserProfileShow;
use App\Models\Users_profile;
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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::resource('Users', UserController::class);
Route::resource('login', LoginController::class);
Route::resource('forgotpassword', ForgotPasswordController::class);
Route::resource('resetpassword', ResetPasswordController::class);
Route::resource('userprofile', UserProfileController::class);
Route::resource('posts', PostController::class);

Route::get('/pin-verification', [UserController::class, 'pinindex']);
Route::post('/pin-verification', [UserController::class, 'verifyEmail']);

// Route::get('/reset-password',[UserController::class,'reset_password']);

Route::get('forgot-password', [UserController::class, 'forgotpassword'])->name('forgot-password');
Route::get('forgot-password/{token}', [UserController::class, 'forgotpasswordvalidation']);
Route::post('forgot-password', [UserController::class, 'resetPassword'])->name('forgot-password');
Route::get('change-password/{token}',[UserController::class,'changepassword']);
Route::put('reset-password', [UserController::class, 'updatePassword'])->name('reset-password');

