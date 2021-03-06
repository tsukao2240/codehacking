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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/post/{id}',['as'=>'home.post','uses'=>'AdminPostController@post']);

Route::group(['middleware'=>'admin'],function(){
    Route::get('/admin','AdminController@index');
    Route::resource('admin/users','AdminUserController');
    Route::resource('admin/posts','AdminPostController');
    Route::resource('admin/categories', 'AdminCategoriesController');
    Route::resource('admin/media', 'AdminMediaController');
    Route::resource('admin/comments', 'PostCommentsController');
    Route::resource('admin/comment/replies', 'CommentRepliesController');
});

Route::group(['middleware'=>'auth'],function(){

    Route::post('comment/reply','CommentRepliesController@createReply');

});

Route::delete('/delete/media','AdminMediaController@deleteMedia');
