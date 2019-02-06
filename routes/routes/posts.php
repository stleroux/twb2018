<?php

// POSTS
Route::get('post/{id}',        ['uses' => 'PostsController@show',            'as' => 'posts.show']);

Route::group(['prefix'=>'posts'], function()
{
	$c = 'PostsController@';
	$r = 'posts.';

   Route::get('newPosts',                 ['uses' => $c . 'newPosts',            'as' => $r . 'newPosts']);

   Route::get('create',                   ['uses' => $c . 'create',              'as' => $r . 'create']);
   Route::post('store',                   ['uses' => $c . 'store',               'as' => $r . 'store']);
   Route::get('{key?}',                   ['uses' => $c . 'index',               'as' => $r . 'index']);
   Route::get('{id}/edit',                ['uses' => $c . 'edit',                'as' => $r . 'edit']);
   Route::put('{id}',                     ['uses' => $c . 'update',              'as' => $r . 'update']);
   Route::delete('{id}',                  ['uses' => $c . 'destroy',             'as' => $r . 'destroy']);

});
