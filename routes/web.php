<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Backend\DasboardController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\BerandaController;
use App\Http\Controllers\Frontend\GalleryController;

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

Route::prefix('/')->group(function () {
    Route::get('/',[BerandaController::class,'index'])->name('beranda');
    Route::get('/article/{slug}',[ArticleController::class,'index'])->name('article');
    Route::get('/gallery/photo',[GalleryController::class,'photo'])->name('photo');
    Route::get('/gallery/video',[GalleryController::class,'video'])->name('video');
    Route::get('/about',[AboutController::class,'index'])->name('about');
    Route::get('/auth/login',[AuthController::class,'login'])->name('login');
    Route::get('/auth/register',[AuthController::class,'register'])->name('register');
});

Route::prefix('/backend')->group(function () {
    Route::get('/dasboard',[DasboardController::class,'index'])->name('dasboard');
});
