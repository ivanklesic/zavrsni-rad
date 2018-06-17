<?php

Route::get('/', function () {
    return view('welcome');
})->name('welcome');



Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/signin', [
    'uses' => 'UserController@postSignIn',
    'as' => 'signin'
]);

Route::post('/signup', [
    'uses' => 'UserController@postSignUp',
    'as' => 'signup',
    'middleware' => 'auth'
]);

Route::get('/posts', [
    'uses' => 'PostController@getPosts',
    'as' => 'posts'
]);

Route::get('/logout', [
    'uses' => 'UserController@getSignOut',
    'as' => 'logout',
    'middleware' => 'auth'
]);

Route::post('/createpost', [
    'uses' => 'PostController@postCreatePost',
    'as' => 'create',
    'middleware' => 'auth'
]);

Route::get('/postcreate', [
    'uses' => 'PostController@getCreatePost',
    'as' => 'post.create',
    'middleware' => 'auth'
]);

Route::get('/delete-post/{post_id}', [
    'uses' => 'PostController@getDeletePost',
    'as' => 'post.delete',
    'middleware' => 'auth'
]);

Route::get('/create_user', [
    'uses' => 'UserController@getCreateUser',
    'as' => 'createuser',
    'middleware' => 'auth'
]);

Route::post('/edit', [
    'uses' => 'PostController@postEditPost',
    'as' => 'edit',
    'middleware' => 'auth'
]);

Route::get('/account', [
   'uses' => 'UserController@getAccount',
   'as' => 'account',
   'middleware' => 'auth'
]);

Route::post('/update', [
    'uses' => 'UserController@postSaveAccount',
    'as' => 'account.save',
    'middleware' => 'auth'
]);

Route::get('/userimage/{filename}', [
    'uses' => 'UserController@getUserImage',
    'as' => 'account.image',
    'middleware' => 'auth'
]);

Route::get('/upload', [
    'uses' => 'UploadController@getUpload',
    'as' => 'upload',
    'middleware' => 'auth'
]);

Route::post('/fileupload', [
    'uses' => 'UploadController@postUploadFiles',
    'as' => 'file.upload',
    'middleware' => 'auth'
]);

Route::get('/gallery', [
    'uses' => 'UploadController@getGallery',
    'as' => 'gallery'
]);

Route::get('/users', [
    'uses' => 'UserController@getUsers',
    'as' => 'users'
]);

Route::get('/delete-user/{user_id}', [
    'uses' => 'UserController@getDeleteUser',
    'as' => 'user.delete',
    'middleware' => 'auth'
]);

Route::get('/videos', [
    'uses' => 'UploadController@getVideos',
    'as' => 'videos',
]);

Route::post('/videoupload', [
    'uses' => 'UploadController@postUploadVideos',
    'as' => 'video.upload',
    'middleware' => 'auth'
]);

Route::post('/schedule', [
    'uses' => 'DateController@postAddSchedule',
    'as' => 'schedule.add',
    'middleware' => 'auth'
]);

Route::get('/delete-date/{date_id}', [
    'uses' => 'DateController@getDeleteDate',
    'as' => 'date.delete',
    'middleware' => 'auth'
]);




/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['middleware' => ['web']], function () {



});
