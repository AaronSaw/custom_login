<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('/', function () {
    return view('auth.register');
});

//Authentication
Route::group(['middleware' => ['login']], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/login/create', [AuthController::class, 'create'])->name('auth.create');
    Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('/register/store', [AuthController::class, 'store'])->name('auth.store');
    Route::get('/forgot', [ForgotPasswordController::class, 'forgot'])->name('forgot.index');
    Route::post('/forgot', [ForgotPasswordController::class, 'store'])->name('forgot.store');
    Route::get('/reset/{token}', [ForgotPasswordController::class, 'reset'])->name('forgot.reset');
    Route::post('/reset', [ForgotPasswordController::class, 'create'])->name('forgot.create');
});
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');

//User
Route::group(['middleware' => ['user']], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
  Route::post('/dashboard/{id}',[UserController::class,'role'])->name('user.role');
});

Route::get('/auth/redirect',[SocialController::class,'githubRedirect']);

Route::get('/auth/callback',[SocialController::class,'githubCallback']);
Route::get('/social-dashboard',[SocialController::class,'index'])->name('socialIndex');

Route::get('/auth/google',[SocialController::class,'googleRedirect']);

Route::get('/auth/google/callback',[SocialController::class,'googleCallback']);
