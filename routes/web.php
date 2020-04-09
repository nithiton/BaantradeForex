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
Auth::routes();
Route::get('/', function () {return view('home');})->name('home');
Route::Resource('news','NewsController')->only(['index','show']);
Route::Resource('activities','ActivitiesController')->only(['index','show']);
Route::Resource('posts','Controller')->only(['index','show']);
Route::Resource('learning','Controller')->only(['index','show']);
Route::get('about_us','MainController@indexAboutUs')->name('about_us');
Route::fallback(function () {
    //
    return view('errors.404');
});


