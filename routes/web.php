<?php

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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.home');
});

Route::group(['prefix' => 'home', 'namespace' => '\Home'], function () {
    Route::get('metro', function () {
        return view('metro');
    });

    Route::get('/', function () {
        return view('home.home');
    })->name('index');

    Route::get('detail', function () {
        return view('home.detail');
    });

    Route::get('label', function () {
        return view('home.label');
    });

    Route::get('timeline', function () {
        return view('home.timeline');
    });

    Route::get('about', function () {
        return view('home.about');
    });

    Route::get('bookcase', function () {
        return view('home.bookcase');
    });
});

Route::group(['prefix' => 'backstage', 'namespace' => '\Backstage'], function () {
    Route::get('dashboard', 'DashboardController@index')->name('backstage.dashboard');

    // 文章管理
    Route::get('article/list', 'ArticleController@list')->name('backstage.article.list');
    Route::get('article/list-data', 'ArticleController@listData')->name('backstage.article.list-data');
    Route::match(['get', 'post'], 'article/editor/{id?}', 'ArticleController@editor')->name('backstage.article.editor');
    Route::post('article/edit', 'ArticleController@edit')->name('backstage.article.edit');
    Route::post('article/upload-image', 'ArticleController@uploadImage')->name('backstage.article.upload-image');
    Route::get('article/del/{id}', 'ArticleController@delArticle')->name('backstage.article.del');
    Route::post('article/del-upload-image', 'ArticleController@delUploadImage')->name('backstage.article.del-upload-image');

});