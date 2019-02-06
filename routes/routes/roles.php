<?php

// ROLES

Route::get('role/{id}',        ['uses' => 'RolesController@show',            'as' => 'roles.show']);

Route::group(['prefix'=>'roles'], function()
{
   $c = 'RolesController@';
   $r = 'roles.';

   Route::get('newRoles',                 ['uses' => $c . 'newRoles',            'as' => $r . 'newRoles']);

   Route::get('create',                   ['uses' => $c . 'create',              'as' => $r . 'create']);
   Route::post('store',                   ['uses' => $c . 'store',               'as' => $r . 'store']);
   Route::get('{key?}',                   ['uses' => $c . 'index',               'as' => $r . 'index']);
   Route::get('{id}/edit',                ['uses' => $c . 'edit',                'as' => $r . 'edit']);
   Route::put('{id}',                     ['uses' => $c . 'update',              'as' => $r . 'update']);
   Route::delete('{id}',                  ['uses' => $c . 'destroy',             'as' => $r . 'destroy']);
   Route::delete('deleteTrashed/{id}',    'RolesController@deleteTrashed')        ->name('roles.deleteTrashed');


});
