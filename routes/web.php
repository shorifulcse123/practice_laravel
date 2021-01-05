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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/home','App\Http\Controllers\PostController@index1');


Route::get('/aboute/page','App\Http\Controllers\FController@index')->name('aboute.page');
Route::get('/post/page','App\Http\Controllers\PostController@index')->name('post.page');
Route::get('/addCategory/page','App\Http\Controllers\PostController@addCategory')->name('add.category');
Route::post('/storeCategory/page','App\Http\Controllers\PostController@storeCategory')->name('store.category');
Route::get('/allCategory/page','App\Http\Controllers\PostController@allCategory')->name('all.category');
Route::get('single/category/view/{id}','App\Http\Controllers\PostController@viewCategory');
Route::get('single/category/delete/{id}','App\Http\Controllers\PostController@deleteCategory');
Route::get('single/category/edit/{id}','App\Http\Controllers\PostController@editCategory');
Route::post('/edit/category/{id}','App\Http\Controllers\PostController@editpostCategory');
Route::post('/store/Write/Post/page','App\Http\Controllers\PostController@WritePost')->name('store.write.page');
Route::get('/all/Post/Show/page','App\Http\Controllers\PostController@allPostShow')->name('all.post');
Route::get('View/post/{id}','App\Http\Controllers\PostController@viewPost');
Route::get('Edit/post/{id}','App\Http\Controllers\PostController@editPost');
Route::post('update/{id}','App\Http\Controllers\PostController@update');
Route::get('delete/post/{id}','App\Http\Controllers\PostController@delete');
