<?php

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

Route::group([
    'namespace' => 'App\Http\Controllers\Frontend',
    'prefix' => '/'
], function () {
    Route::get('/', 'BerandaController@index');
    Route::get('article/{slug}', 'ArticleController@index');
    Route::get('gallery/photo', 'GalleryController@photo');
    Route::get('gallery/video', 'GalleryController@video');
    Route::get('about', 'AboutController@index');
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

Route::group([
    'namespace' => 'App\Http\Controllers\Backend',
    'prefix' => 'backend'
], function () {
    Route::get('/', 'DasboardController@index');
    Route::get('category_article', 'CategoryArticleController@index');
    Route::get('index_article', 'IndexArticleController@index');
    Route::get('page_web', 'PageWebController@index');
    Route::get('comment_article', 'CommentArticleController@index');
    Route::get('user', 'UserController@index');
    Route::get('photo', 'GalleryController@photo');
    Route::get('video', 'GalleryController@video');
    Route::get('profile', 'UserController@profile');

    Route::prefix('article')->group(function () {
        Route::get('/', 'ArticleController@index')->name('backend.article');
        // Route::get('/{slug}', 'ArticleController@index');
        Route::get('/add', 'ArticleController@add')->name('backend.article.add');
        Route::post('/add', 'ArticleController@create')->name('backend.article.create');
        Route::get('/edit/{slug}', 'ArticleController@edit')->name('backend.article.edit');

        Route::post('/update', 'ArticleController@update')->name('backend.article.update');
        Route::delete('/delete/{slug}', 'ArticleController@delete')->name('backend.article.delete');

        Route::get('/datatable', 'ArticleController@datatable')->name('backend.article.datatable');

    });
});
