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

use App\Support\Helper;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(route('home.home-page'));
})->name('home.index');

Route::group(['prefix' => 'home', 'namespace' => '\Home'], function () {
    // 主页
    Route::get('home-page', 'HomePageController@homePage')->name('home.home-page');
    // 文章列表
    Route::get('articles-list', 'HomePageController@articlesList')->name('home.articles-list');
    // 文章详情
    Route::get('detail/{id}', 'DetailController@detail')->name('home.detail');
    // 标签页
    Route::get('label', 'LabelController@labelPage')->name('home.label-page');
    // 时间轴
    Route::get('time-line', 'TimeLineController@timeLinePage')->name('home.time-line-page');
    // 时间轴文章列表
    Route::get('time-line/articles', 'TimeLineController@timeLineArticles')->name('home.time-line.articles');

    Route::get('about', function () {
        return view('home.about');
    });

    Route::get('bookcase', function () {
        return view('home.bookcase');
    });

    Route::get('metro', function () {
        return view('metro');
    });
});

Route::group(['prefix' => 'backstage', 'namespace' => '\Backstage'], function () {
    // 登录页
    Route::get('login', 'LoginController@login')->name('backstage.login');

    // 后台首页
    Route::get('dashboard', 'DashboardController@index')->name('backstage.dashboard');

    // 文章管理
    Route::post('article/upload-image', 'ArticleController@uploadImage')->name('backstage.article.upload-image');
    Route::post('article/del-upload-image', 'ArticleController@delUploadImage')->name('backstage.article.del-upload-image');
    Helper::routeDefine('article');
//    Route::get('article/list', 'ArticleController@list')->name('backstage.article.list');
//    Route::get('article/list-data', 'ArticleController@listData')->name('backstage.article.list-data');
//    Route::match(['get', 'post'], 'article/editor/{id?}', 'ArticleController@editor')->name('backstage.article.editor');
//    Route::post('article/edit', 'ArticleController@edit')->name('backstage.article.edit');
//    Route::get('article/del/{id}', 'ArticleController@delArticle')->name('backstage.article.del');

    // 标签管理
    Helper::routeDefine('label');
//    Route::get('label/list', 'LabelController@list')->name('backstage.label.list');
//    Route::get('label/list-data', 'LabelController@listData')->name('backstage.label.list-data');
//    Route::match(['get', 'post'], 'label/editor/{id?}', 'LabelController@editor')->name('backstage.label.editor');
//    Route::post('label/edit', 'LabelController@edit')->name('backstage.label.edit');
//    Route::get('label/del/{id}', 'LabelController@delLabel')->name('backstage.label.del');

    // 分类管理
    Helper::routeDefine('category');
//    Route::get('category/list', 'CategoryController@list')->name('backstage.category.list');
//    Route::get('category/list-data', 'CategoryController@listData')->name('backstage.category.list-data');
//    Route::match(['get', 'post'], 'category/editor/{id?}', 'CategoryController@editor')->name('backstage.category.editor');
//    Route::post('category/edit', 'CategoryController@edit')->name('backstage.category.edit');
//    Route::get('category/del/{id}', 'CategoryController@delCategory')->name('backstage.category.del');
});