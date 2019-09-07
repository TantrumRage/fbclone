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

/****************** TEMPLATES *******************/
Route::get('templates/messages/load', function() {
	return view('templates/messages');
});
Route::get('templates/messages/selected/load', function() {
	return view('templates/messages_right');
});
/********************************************/

/****************** PAGES *******************/
Route::get('/', "PagesController@index")->middleware('auth');

Route::get('/{nickname}', 'PagesController@profile')->name('profile');

/********************************************/

/****************** POSTS *******************/
Route::post('/post/save', "PostsController@save")->name('new post')->middleware('auth');
Route::post('/post/edit', "PostsController@edit")->name('edit post')->middleware('auth');
Route::post('/post/update', "PostsController@update")->name('update post')->middleware('auth');
Route::post('/post/delete', "PostsController@delete")->name('delete post')->middleware('auth');
/********************************************/

/****************** LIKES *******************/

Route::post('/post/like/{postId}', 'LikesController@like')->name('like post');
Route::post('/post/unlike/{postId}', 'LikesController@unlike')->name('unlike post');

/********************************************/

/****************** COMMENTS *******************/

Route::post('/post/comment', 'CommentsController@create')->name('create comment');
//Route::post('/post/unlike/{postId}', 'LikesController@unlike')->name('unlike post');

/********************************************/

/****************** PROFILES ******************/

Route::get('/{nickname}/{section}', 'ProfilesController@getSection')->name('profile sections');
Route::post('/profile/about/update', 'ProfilesController@update')->name('update about on profile');
Route::post('/profile/profilepicture/update', 'ProfilesController@updateProfilePicture')->name('update profile picture');

/**********************************************/


/****************** FRIENDS ******************/
Route::post('/{username}/add', 'FriendsController@add')->name('add friend');
Route::post('/{username}/accept', 'FriendsController@accept')->name('accept friend request');
Route::post('/{username}/cancel', 'FriendsController@cancel')->name('cancel friend request');
Route::post('/{username}/decline', 'FriendsController@decline')->name('decline friend request');
Route::post('/{username}/unfriend', 'FriendsController@unfriend')->name('unfriend');
/**********************************************/