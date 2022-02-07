<?php

use Illuminate\Support\Facades\Route;

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

Route::group([
    'namespace' => 'App\Http\Controllers\Auth',
    'prefix' => 'auth'
    ], function () {
        Route::get('login', 'Auth\AuthController@login');
        Route::get('logout', 'Auth\AuthController@logout');
        Route::get('forget', 'Auth\AuthController@forget');
        Route::get('register', 'Auth\AuthController@register');
});

Route::group(['namespace' => 'App\Http\Controllers\Backend', 'prefix' => 'backend'], function () {
    Route::get('/', 'DasboardController@page_index');
    Route::get('profile', 'UserAccountController@page_profile');

    Route::prefix('master')->group(function () {
        Route::get('user', 'UserAccountController@page_index');
        Route::get('category_article', 'CategoryArticleController@page_index');
        Route::get('index_article', 'IndexArticleController@page_index');
        Route::get('page_web', 'PageWebController@page_index');
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

        Route::post('create', 'GalleryAlbumController@create_gallery');
        Route::delete('delete', 'GalleryAlbumController@delete_gallery');
        Route::put('update_status', 'GalleryAlbumController@update_status_gallery');

        Route::get('video', 'GalleryAlbumController@page_video');
        Route::get('video/read', 'GalleryAlbumController@read_video');
    });
});
