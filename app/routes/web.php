<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::auth();

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');


Route::group(['middleware'=>'admin'], function() {

    Route::get('/admin', function () {
        return view('admin.index');
    });

    Route::get('admin/test', function() {
        return 'test';
    })->name('admin.users.index');

   // Route::resource('admin/users', 'AdminUsersController')->as('admin');

    Route::resource('admin/users', 'AdminUsersController', ['names'=>[

        'index'=>'admin.users.index',
        'create'=>'admin.users.create',
        'store'=>'admin.users.store',
        'edit'=>'admin.users.edit',

    ]]);

    Route::get('/post/{slug}', ['as'=>'home.post', 'uses'=>'AdminPostsController@show']);

    Route::resource('admin/posts', 'AdminPostsController', ['names' => [

        'index' => 'admin.posts.index',
        'create' => 'admin.posts.create',
        'store' => 'admin.posts.store',
        'edit' => 'admin.posts.edit',

    ]]);

    Route::resource('admin/categories', 'AdminCategoriesController', ['names' => [

        'index' => 'admin.categories.index',
        'create' => 'admin.categories.create',
        'store' => 'admin.categories.store',
        'edit' => 'admin.categories.edit',

    ]]);

    Route::resource('admin/media', 'AdminMediaController', ['names' => [

        'index' => 'admin.media.index',
        'create' => 'admin.media.create',
        'store' => 'admin.media.store',
        'edit' => 'admin.media.edit',

    ]]);

    Route::resource('admin/comments', 'PostCommentsController', ['names' => [

        'index' => 'admin.comments.index',
        'create' => 'admin.comments.create',
        'store' => 'admin.comments.store',
        'edit' => 'admin.comments.edit',
        'show'=> 'admin.comments.show',

    ]]);

    Route::resource('admin/comment/replies', 'CommentRepliesController', ['names' => [

        'index' => 'admin.comments.replies.index',
        'create' => 'admin.comments.replies.create',
        'store' => 'admin.comments.replies.store',
        'edit' => 'admin.comments.replies.edit',
        'show'=> 'admin.comments.replies.show',

    ]]);

});