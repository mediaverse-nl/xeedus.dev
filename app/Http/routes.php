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


//Route::group(['middleware' => ['web']], function () {
Route::auth();

//static pages
Route::get('/', ['as' => 'home_page', 'uses' => 'PagesController@home']);
Route::get('/about', ['as' => 'page_about', 'uses' => 'PagesController@about']);
Route::get('/faq', ['as' => 'page_faq', 'uses' => 'PagesController@faq']);
Route::get('/privacy', ['as' => 'page_privacy', 'uses' => 'PagesController@privacy']);
Route::get('/terms', ['as' => 'page_terms', 'uses' => 'PagesController@terms']);
Route::get('/sitemap', ['as' => 'page_sitemap', 'uses' => 'PagesController@sitemap']);
Route::get('/cookie', ['as' => 'page_cookie', 'uses' => 'PagesController@cookie']);
Route::get('/support', ['as' => 'page_support', 'uses' => 'PagesController@support']);
Route::get('/contact', ['as' => 'page_contact', 'uses' => 'PagesController@contact']);


route::get('/image/{filename}', ['as' => 'get_thumbnail', 'uses' => 'VideoController@GetImage']);
//route::get('/video/stream/{filename}', ['as' => 'get_video', 'uses' => 'VideoController@GetVideo']);

route::get('/stream/{video_key}', ['as' => 'get_video', 'uses' => 'VideoController@GetVideo']);

//Route::get('/player', function () {
//    $video = "videos/media/obng6bDpV5.mp4";
//    $mime = "video/mp4";
//    $title = "Os Simpsons";
//    return view('player')->with(compact('video', 'mime', 'title'));
//});

//main and sub categories
Route::get('/courses/{name}/c-{id}', ['as' => 'category_index', 'uses' => 'CategoryController@index']);
Route::get('/courses/{name}/{subname}/c-{id}', ['as' => 'video_index', 'uses' => 'VideoController@index']);

//search input ajax
Route::get('/find', 'SearchController@find');

//author profile
Route::get('/{name}/a-{id}', ['as' => 'author_show', 'uses' => 'AuthorController@show']);


Route::get('/x', ['as' => 'test', 'uses' => 'TestController@index']);

    //authorized user
Route::group(['middleware' => ['auth']], function () {

    Route::get('/video/{key}', ['as' => 'video_show', 'uses' => 'VideoController@show']);
    Route::post('/video/{key}', ['as' => 'order_store', 'uses' => 'OrderController@store']);

    Route::get('/orders', ['as' => 'orders_show', 'uses' => 'Auth\OrderController@index']);

//    Route::get('/review', ['as' => 'review_show', 'uses' => 'Auth\ReviewController@index']);

    Route::get('/credits/order/{id}', ['as' => 'credits_show', 'uses' => 'Auth\CreditController@show']);
    Route::post('mollie/webhook/{paymentId}', ['as' => 'credits_mollie', 'uses' => 'Auth\CreditController@mollie']);
    Route::resource('mollie/webhook', 'Auth\CreditController@mollie');

    Route::get('/credits', ['as' => 'credits_index', 'uses' => 'Auth\CreditController@index']);
    Route::post('/credits', ['as' => 'credits_update', 'uses' => 'Auth\CreditController@update']);
    Route::patch('/credits', ['as' => 'credits_store', 'uses' => 'Auth\CreditController@store']);

    Route::post('/review/{video_key}', ['as' => 'review_store', 'uses' => 'Auth\ReviewController@store']);

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
//    Route::get('/author', ['as' => '', 'uses' => 'Controller@index']);
    Route::group(['prefix' => 'author'], function () {
        //author panel video management
        Route::get('/', ['as' => 'author_home', 'uses' => 'Author\HomeController@index']);

        //author video panel
        Route::get('/video', ['as' => 'author_video_index', 'uses' => 'Author\VideoController@index']);
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
        //admin home page
        Route::get('/', ['as' => 'admin_panel', 'uses' => 'AdminController@index']);
        //admin authors
        Route::get('author', ['as' => 'admin_authors_all', 'uses' => 'Admin\AuthorController@index']);
        Route::get('author/{id}', ['as' => 'admin_authors_show', 'uses' => 'Admin\AuthorController@show']);
        Route::patch('author', ['as' => 'admin_authors_update', 'uses' => 'Admin\AuthorController@update']);
//        Route::get('author/requests', ['as' => 'admin_authors_requests', 'uses' => 'Admin\AuthorController@index']);
        //admin videos
        Route::get('videos', ['as' => 'admin_videos_all', 'uses' => 'Admin\VideoController@index']);
        Route::get('videos/{id}/edit', ['as' => 'admin_videos_edit', 'uses' => 'Admin\VideoController@edit']);
        Route::post('videos/{id}', ['as' => 'admin_videos_update', 'uses' => 'Admin\VideoController@update']);
        //admin categories
        Route::get('categories', ['as' => 'admin_category_all', 'uses' => 'Admin\CategoryController@index']);
        Route::get('categories/{category}/edit', ['as' => 'admin_category_edit', 'uses' => 'Admin\CategoryController@edit']);
        Route::get('categories/create', ['as' => 'admin_category_create', 'uses' => 'Admin\CategoryController@create']);
        Route::post('categories', ['as' => 'admin_category_store', 'uses' => 'Admin\CategoryController@store']);
        Route::patch('categories', ['as' => 'admin_category_update', 'uses' => 'Admin\CategoryController@update']);
        //admin reviews
        Route::get('reviews', ['as' => 'admin_reviews_all', 'uses' => 'Admin\ReviewController@index']);
        Route::get('reviews/{id}', ['as' => 'admin_reviews_show', 'uses' => 'Admin\ReviewController@show']);
        Route::post('reviews/{id}', ['as' => 'admin_reviews_update', 'uses' => 'Admin\ReviewController@update']);
        Route::delete('reviews/{id}', ['as' => 'admin_reviews_destroy', 'uses' => 'Admin\ReviewController@destroy']);
        //admin orders
        Route::get('orders', ['as' => 'admin_orders_all', 'uses' => 'Admin\OrderController@index']);
        Route::get('orders/{id}/edit', ['as' => 'admin_orders_edit', 'uses' => 'Admin\OrderController@edit']);
        Route::post('orders/{id}', ['as' => 'admin_orders_update', 'uses' => 'Admin\OrderController@update']);
        //admin users
        Route::get('users', ['as' => 'admin_profile_all', 'uses' => 'Admin\UserController@index']);
        Route::get('users/{id}/edit', ['as' => 'admin_user_edit', 'uses' => 'Admin\UserController@edit']);
        Route::post('users/{id}', ['as' => 'admin_user_update', 'uses' => 'Admin\UserController@update']);
        Route::delete('users/{id}', ['as' => 'admin_user_destroy', 'uses' => 'Admin\UserController@destroy']);
        //admin events
        Route::get('events', ['as' => 'admin_events_all', 'uses' => 'Admin\EventController@index']);
    });
});






