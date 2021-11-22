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


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
Auth::routes();
Route::get('/', 'App\Http\Controllers\PostController@index')->name('index');
Route::get('posts/header', 'App\Http\Controllers\PostController@search')->name('posts.header');
Route::get('posts/about/{id}', 'App\Http\Controllers\PostController@show')->name('posts.about');
Route::get('posts/category/{id}', 'App\Http\Controllers\PostController@edit')->name('posts.category');
// Route::get('/{any}', function(){
//   return view('index');
// })->where('any', '.*');
