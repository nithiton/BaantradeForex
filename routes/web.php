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
    Route::Resource('activities','ActivitiesController')->parameters(['activities'=>'activity:slug']);
    Route::Resource('posts','PostsController')->parameters(['posts'=>'post:slug']);
});
Route::fallback(function () {
    //
    return view('errors.404');
});


