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

Route::get('/', function () {
    return view('welcome');
});



Route::prefix('admin')->group(function () {

    Route::name('admin.')->group(function (){
        Route::view('/login', 'backstage.login')->name('login');

        Route::namespace('Admin')->group(function (){
            Route::post('/login',"LoginController@authenticate")->name('loginauth');
            Route::get('/quit',"LoginController@quit")->name('quit');
            Route::middleware('auth.admin')->group(function (){
                Route::get('/home',"IndexController@index")->name('home');
                Route::get('/welcome',"IndexController@welcome")->name('welcome');
                Route::get('/info',"InfoController@index")->name('info');
                Route::post('/info',"InfoController@update");

                /*栏目路由*/
                Route::get('/category',"CategoryController@index")->name('category');
                Route::get('/category-add',"CategoryController@addview")->name('category.add');
                Route::post('/category-add',"CategoryController@add");
                Route::get('/category-update',"CategoryController@updateview")->name('category.update');
                Route::post('/category-update',"CategoryController@update");
                //Route::get('/category-list',"categoryController@ajax_get_list")->name('category.list');
                Route::post('/category-del',"CategoryController@set_del")->name('category.del');

                Route::post('/category-ajax-cate/{id}',"CategoryController@ajax_get_cate")->name('category.ajax');
                /*栏目路由*/

                /*文章路由*/
                Route::get('/article',"ArticleController@index")->name('article');
                Route::get('/article-add',"ArticleController@addview")->name('article.add');
                Route::post('/article-add',"ArticleController@add");
                Route::get('/article-update',"ArticleController@updateview")->name('article.update');
                Route::post('/article-update',"ArticleController@update");
                /*文章路由*/

                /*相册路由*/
                Route::get('/album',"AlbumController@index")->name('album');
                Route::get('/album/getdate',"AlbumController@getdate")->name('album.getdate');

                //                //getdate
                Route::get('/album-add',"AlbumController@addview")->name('album.add');
                Route::post('/album-add',"AlbumController@add");
                Route::post('/album-del',"AlbumController@del")->name('album.del');
                Route::get('/album-update/{id}',"AlbumController@updateview")->name('album.update');
                Route::post('/album-update',"AlbumController@update");
                /*相册路由*/
            });
        });

    });


});




