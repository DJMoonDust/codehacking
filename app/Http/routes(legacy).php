<?php

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

    Route::get('/', function () {

        return view('welcome');

    });


    Route::auth();


    Route::get('/home', 'HomeController@index');

    Route::get('/post/{slug}', ['as'=>'home.post', 'uses'=>'AdminPostsController@show']);


Route::group(['middleware'=>'admin'], function(){

    Route::get('/admin', function(){
        return view('admin.index');
    });

    Route::resource('admin/users', 'AdminUsersController', ['names'=>[

        'index'=>'admin.users.index',
        'create'=>'admin.users.create',
        'store'=>'admin.users.store',
        'edit'=>'admin.users.edit',

    ]]);

    Route::resource('admin/posts', 'AdminPostsController', ['as' => 'admin']);

    Route::resource('admin/categories', 'AdminCategoriesController', ['as' => 'admin']);

    Route::resource('admin/media', 'AdminMediaController', ['as' => 'admin']);

    Route::resource('admin/comments', 'PostCommentsController', ['as' => 'admin']);

    Route::resource('admin/comment/replies', 'CommentRepliesController', ['as' => 'admin']);

});


Route::group(['middleware'=>'auth'], function(){

    Route::post('comment/reply', 'CommentRepliesController@createReply');

});