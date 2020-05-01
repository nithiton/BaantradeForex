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
Auth::routes(['register' => false]);
Route::get('/', function () {return view('home');})->name('home');
Route::Resource('news','NewsController')
    ->parameters(['news'=>'news:slug'])->only(['index','show']);

Route::Resource('activities','ActivitiesController')
    ->parameters(['activities'=>'activity:slug'])->only(['index','show']);

Route::Resource('posts','PostsController')
    ->parameters(['posts'=>'post:slug'])->only(['index','show']);
//Route::Resource('learning','Controller');
Route::get('about_us','MainController@indexAboutUs')->name('about_us');

Route::name('admin.')->prefix('admin')->middleware('auth')->group(function() {
    Route::get('/','MainController@indexAdmin')->name('home');

    Route::bind('news_trash', function($id) {
        return \App\Models\News::withTrashed()->find($id);
    });
    Route::post('news/{news_trash}/restore','AdminNewsController@restore')->name('news.restore');
    Route::Resource('news','AdminNewsController')->parameters(['news'=>'news:slug']);

    Route::bind('activity_trash', function($id) {
        return \App\Models\Activities::withTrashed()->find($id);
    });
    Route::post('activities/{activity_trash}/restore','AdminActivitiesController@restore')->name('activities.restore');
    Route::Resource('activities','AdminActivitiesController')->parameters(['activities'=>'activity:slug']);

    Route::bind('post_trash', function($id) {
        return \App\Models\Posts::withTrashed()->find($id);
    });
    Route::post('posts/{post_trash}/restore','AdminPostsController@restore')->name('posts.restore');
    Route::Resource('posts','AdminPostsController')->parameters(['posts'=>'post:slug']);

    Route::bind('ad_trash', function($id) {
        return \App\Models\Ads::withTrashed()->find($id);
    });
    Route::post('ads/{ad_trash}/restore','AdminAdsController@restore')->name('ads.restore');
    Route::Resource('ads','AdminAdsController')->parameters(['ads'=>'ad:slug']);

    Route::bind('video_trash', function($id) {
        return \App\Models\Theaters::withTrashed()->find($id);
    });
    Route::post('theaters/{video_trash}/restore','AdminTheatersController@restore')->name('theaters.restore');
    Route::Resource('theaters','AdminTheatersController')->parameters(['theaters'=>'video:slug']);
});
Route::fallback(function () {
    //
    return view('errors.404');
});


