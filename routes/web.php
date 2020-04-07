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

Route::get('/', function () {return view('home');})->name('home');
Route::Resource('news','NewsController')->except(['']);
Route::Resource('activities','Controller')->except(['']);
Route::Resource('posts','Controller')->except(['']);
Route::Resource('learning','Controller')->except(['']);
Route::get('about_us','MainController@indexAboutUs')->name('about_us');
Route::fallback(function () {
    //
    return view('errors.404');
});
