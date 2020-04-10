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

Route::name('admin.')->prefix('admin')->group(function() {
    Route::get('/','MainController@indexAdmin')->name('home');
    Route::Resource('news','NewsController');
    Route::Resource('activities','ActivitiesController');
    Route::Resource('posts','PostsController');
});
Route::fallback(function () {
    //
    return view('errors.404');
});


