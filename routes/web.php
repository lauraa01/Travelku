<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Input;
use App\User;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
Route::post('/profile',[HomeController::class, 'upload']);

Route::get('route', [HomeController::class, 'route'])->name('route');
Route::post('route/store',[HomeController::class, 'store']);
Route::get('route/delete{id}',[HomeController::class, 'deleteOrder']);

Route::get('review', [ReviewController::class, 'imageUpload'])->name('review');
Route::post('review/proses', [ReviewController::class, 'imageUploadPost']);
Route::get('review/delete{id}', [ReviewController::class, 'imageUploadDelete']);

Route::get('/auth/redirect', [LoginController::class, 'redirectToProvider']);
Route::get('/auth/callback', [LoginController::class, 'handleProviderCallback']);
