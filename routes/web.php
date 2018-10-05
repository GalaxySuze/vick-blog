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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    // 发表评论
    Route::post('discuss-article', 'CommentController@discussArticle')->name('home.discuss-article');
    // 关于
    Route::get('about', function () {
        return view('home.about');
    })->name('home.about');
    // 404
    Route::get('not-open', function () {
        abort('404');
    })->name('home.not-open');
    // 书籍推荐
    Route::get('bookcase', function () {
        return view('home.bookcase');
    });
    // 个人中心
    Route::get('metro', function () {
        return view('metro');
    })->middleware('auth');
});

Route::group(['prefix' => 'backstage', 'namespace' => '\Backstage', 'middleware' => ['auth', 'checkRole']], function () {
    // 后台登录页
    Route::get('login', 'LoginController@login')->name('backstage.login');
    // 后台首页
    Route::get('dashboard', 'DashboardController@index')->name('backstage.dashboard');
    // 文章管理
    Route::post('article/upload-image', 'ArticleController@uploadImage')->name('backstage.article.upload-image');
    Route::post('article/del-upload-image', 'ArticleController@delUploadImage')->name('backstage.article.del-upload-image');
    Helper::routeDefine('article');
    // 评论管理
    Helper::routeDefine('comment');
    // 标签管理
    Helper::routeDefine('label');
    // 分类管理
    Helper::routeDefine('category');
    // 权限管理
    Helper::routeDefine('user');
    // 角色管理
    Helper::routeDefine('role');
    // 权限管理
    Helper::routeDefine('permissions');
    // 友链管理
    Helper::routeDefine('link');
    // 日志管理
    Helper::routeDefine('log');
});
// 前台首页
Route::get('/home', function () {
    return redirect(route('home.home-page'));
})->name('home.home');
Route::get('/', function () {
    return redirect(route('home.home-page'));
})->name('home.index');
// 身份验证
Auth::routes();
