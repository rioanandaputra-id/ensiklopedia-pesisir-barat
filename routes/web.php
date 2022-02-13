<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::group([
    'namespace' => 'App\Http\Controllers\Frontend',
    'prefix' => '/'
    ], function () {
        Route::get('/', 'BerandaController@page_index');
        Route::get('article/{slug}', 'ArticleController@page_index');
        Route::get('gallery/photo', 'GalleryController@page_photo');
        Route::get('gallery/video', 'GalleryController@page_video');
        Route::get('about', 'AboutController@page_index');
});

Route::group(['namespace' => 'App\Http\Controllers\Backend', 'prefix' => 'backend', 'middleware' => 'auth'], function () {
    Route::get('/', 'DasboardController@page_index');
    Route::get('profile', 'UserController@page_profile');

    Route::prefix('master')->group(function () {
        Route::get('user', 'UserController@page_index');
        Route::get('user/add', 'UserController@page_add');
        Route::get('user/edit', 'UserController@page_edit');
        Route::get('user/read', 'UserController@read_data');


        Route::post('user/create', 'UserController@create_data');
        Route::delete('user/delete', 'UserController@delete_data');
        Route::put('user/update', 'UserController@update_data');
        Route::put('user/update_status', 'UserController@update_data_status');

        Route::get('category_article', 'ArticleCategoryController@page_index');
        Route::get('category_article/read', 'ArticleCategoryController@read_data');
        Route::post('category_article/create', 'ArticleCategoryController@create_data');
        Route::put('category_article/update', 'ArticleCategoryController@update_data');
        Route::delete('category_article/delete', 'ArticleCategoryController@delete_data');

        Route::get('index_article', 'ArticleIndexController@page_index');
        Route::get('index_article/read', 'ArticleIndexController@read_data');
        Route::delete('index_article/delete', 'ArticleIndexController@delete_data');
    });

    Route::prefix('article')->group(function () {
        Route::get('/', 'ArticleController@page_index');
        Route::get('/add', 'ArticleController@page_add');
        Route::get('/edit', 'ArticleController@page_edit');

        Route::post('/create', 'ArticleController@create_data');
        Route::get('/read', 'ArticleController@read_data');
        Route::put('/update', 'ArticleController@update_data');
        Route::put('/update_status', 'ArticleController@update_data_status');
        Route::delete('/delete', 'ArticleController@delete_data');
    });

    Route::prefix('gallery')->group(function () {
        Route::get('photo', 'GalleryAlbumController@page_photo');
        Route::get('photo/read', 'GalleryAlbumController@read_photo');
        Route::get('photo/edit', 'GalleryAlbumController@page_edit_photo');

        Route::post('upload', 'GalleryAlbumController@upload_photo_video');
        Route::delete('unlink', 'GalleryAlbumController@unlink_photo_video');

        Route::post('create', 'GalleryAlbumController@create_gallery');
        Route::delete('delete', 'GalleryAlbumController@delete_gallery');
        Route::put('update_status', 'GalleryAlbumController@update_status_gallery');

        Route::get('video', 'GalleryAlbumController@page_video');
        Route::get('video/read', 'GalleryAlbumController@read_video');
        Route::get('video/edit', 'GalleryAlbumController@page_edit_video');
    });

    Route::prefix('about')->group(function () {
        Route::get('/', 'AboutController@page_index');
        Route::put('/', 'AboutController@page_index');
    });
});

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
