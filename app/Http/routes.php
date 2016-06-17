<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

//home page
Route::get('/', ['as' => 'home_page', 'uses' => 'HomeController@index']);
//main and sub categories
Route::get('/courses/{name}', ['as' => 'video_categories_sub', 'uses' => 'CategoryController@show']);
//author profile
Route::get('/author/{name}', ['as' => 'author_show', 'uses' => 'AuthorController@show']);

//authorized user
Route::group(['middleware' => 'auth'], function () {

    Route::get('/video/{key}', ['as' => 'video_show', 'uses' => 'VideoController@show']);
    Route::post('/video/{key}', ['as' => 'order_store', 'uses' => 'OrderController@store']);

    Route::get('/credits', ['as' => 'credits_show', 'uses' => 'Auth\CreditController@index']);
    Route::post('/credits', ['as' => 'credits_update', 'uses' => 'Auth\CreditController@update']);

    Route::get('/profile/courses', ['as' => 'profile_courses_index', 'uses' => 'Auth\VideoController@index']);
    
    Route::get('/profile', ['as' => 'profile_show', 'uses' => 'UserController@show']);
    Route::get('/profile/edit', ['as' => 'profile_edit', 'uses' => 'UserController@edit']);
    Route::post('/profile', ['as' => 'profile_update', 'uses' => 'UserController@update']);
    Route::resource('/profile', 'UserController',
        ['only' => ['update', 'edit']]
    );

    Route::get('/partner/sign-up', ['as' => 'author_create', 'uses' => 'AuthorController@create']);
    Route::patch('/partner', ['as' => 'author_store', 'uses' => 'AuthorController@store']);
    Route::resource('/partner', 'AuthorController',
        ['only' => ['update', 'store']]
    );

});

//authorized author
Route::group(['middleware' => ['auth', 'author']], function () {

    //author panel
    Route::get('partner', ['as' => '', 'uses' => 'Controller@index']);

    Route::group(['prefix' => 'partner'], function () {
        //author panel video management
        Route::get('/', ['as' => 'author_home', 'uses' => 'Author\HomeController@index']);

        //author video panel
        Route::get('video', ['as' => 'author_video_index', 'uses' => 'Author\VideoController@index']);
        Route::get('video/create', ['as' => 'author_video_create', 'uses' => 'Author\VideoController@create']);
        Route::post('video', ['as' => 'author_video_store', 'uses' => 'Author\VideoController@store']);
        Route::get('video/{id}', ['as' => 'author_video_show', 'uses' => 'Author\VideoController@show']);
        Route::get('video/{id}/edit', ['as' => 'author_video_edit', 'uses' => 'Author\VideoController@edit']);
        Route::patch('video', ['as' => 'author_video_update', 'uses' => 'Author\VideoController@update']);
        Route::delete('video/{id}', ['as' => 'author_video_destroy', 'uses' => 'Author\VideoController@destroy']);

        //author profile panel
        Route::get('profile', ['as' => 'author_profile_index', 'uses' => 'Author\BiographyController@index']);
        Route::get('profile/edit', ['as' => 'author_profile_edit', 'uses' => 'Author\BiographyController@edit']);
        Route::get('profile/preview', ['as' => 'author_profile_show', 'uses' => 'Author\BiographyController@show']);
        Route::patch('profile', ['as' => 'author_profile_update', 'uses' => 'Author\BiographyController@update']);

    });

});

//authorized admin
Route::group(['middleware' => ['auth', 'admin']], function () {

    Route::group(['prefix' => 'admin'], function () {

        Route::get('/', ['as' => 'admin_panel', 'uses' => 'AdminController@index']);
        Route::get('profiles', ['as' => 'admin_profile_all', 'uses' => 'UserController@index']);

        Route::get('author', ['as' => 'admin_authors_all', 'uses' => 'Admin\AuthorController@index']);
        Route::get('author/{id}', ['as' => 'admin_authors_show', 'uses' => 'Admin\AuthorController@show']);
        Route::patch('author', ['as' => 'admin_authors_update', 'uses' => 'Admin\AuthorController@update']);
//        Route::get('author/requests', ['as' => 'admin_authors_requests', 'uses' => 'Admin\AuthorController@index']);

        Route::get('videos', ['as' => 'admin_videos_all', 'uses' => 'Admin\VideoController@index']);
//        Route::get('videos', ['as' => 'admin_videos_all', 'uses' => 'Admin\VideoController@index']);

        Route::get('categories', ['as' => 'admin_category_all', 'uses' => 'CategoryController@index']);
        Route::get('categories/{category}/edit', ['as' => 'admin_category_edit', 'uses' => 'Admin\CategoryController@edit']);

        Route::get('categories/create', ['as' => 'admin_category_create', 'uses' => 'Admin\CategoryController@create']);
        Route::post('categories', ['as' => 'admin_category_store', 'uses' => 'Admin\CategoryController@store']);
        Route::patch('categories', ['as' => 'admin_category_update', 'uses' => 'Admin\CategoryController@update']);
    
    });

});






