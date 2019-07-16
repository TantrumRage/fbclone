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

Auth::routes();

/****************** PAGES *******************/
Route::get('/', "PagesController@index")->middleware('auth');

Route::get('/{username}', 'PagesController@profile')->name('profile');

/********************************************/

/****************** POSTS *******************/
Route::post('/post/save', "PostsController@save")->name('new post')->middleware('auth');
Route::post('/post/edit', "PostsController@edit")->name('edit post')->middleware('auth');
Route::post('/post/update', "PostsController@update")->name('update post')->middleware('auth');
Route::post('/post/delete', "PostsController@delete")->name('delete post')->middleware('auth');
/********************************************/

/****************** LIKES *******************/

Route::post('/post/like/{postId}', 'LikesController@like')->name('like post');

/********************************************/


/****************** PROFILES ******************/

Route::get('/{username}/{section}', 'ProfilesController@getSection')->name('profile sections');
Route::post('/profile/about/update', 'ProfilesController@update')->name('update about on profile');

/**********************************************/