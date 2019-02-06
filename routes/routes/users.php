<?php

// USERS
Route::group(['prefix'=>'users'], function()
{

	Route::get('trashed',							'UsersController@trashed')					->name('users.trashed');
	Route::get('showTrashed/{id}',				'UsersController@showTrashed')			->name('users.showTrashed');
	Route::get('restore/{id}',						'UsersController@restore')					->name('users.restore');
	Route::get('resetPwd/{id}',					'UsersController@resetPwd')				->name('users.resetPwd');
	Route::get('newUsers/{id?}',					'UsersController@newUsers')				->name('users.newUsers');
	Route::get('inactiveUsers/{id?}',			'UsersController@inactiveUsers')			->name('users.inactiveUsers');

	Route::post('restoreAll',              	'UsersController@restoreAll')       	->name('users.restoreAll');
	Route::post('trashAll',                	'UsersController@trashAll')    		   ->name('users.trashAll');
	Route::post('deleteAll',            	   'UsersController@deleteAll') 	         ->name('users.deleteAll');
	Route::post('changePassword/{id}',			'UsersController@changePassword')		->name('users.changePassword');

	Route::delete('deleteTrashed/{id}',			'UsersController@deleteTrashed')			->name('users.deleteTrashed');

	
	
	Route::get('create',								'UsersController@create')					->name('users.create');
	Route::post('',									'UsersController@store')					->name('users.store');
	Route::get('{id}/show',							'UsersController@show')						->name('users.show');
	Route::get('{key?}',								'UsersController@index')					->name('users.index');
	Route::get('{id}/edit',							'UsersController@edit')						->name('users.edit');
	Route::put('{id}',								'UsersController@update')					->name('users.update');
	Route::delete('{id}',							'UsersController@destroy')					->name('users.destroy');
});

// Route::resource('users', 'UsersController', ['parameters' => [
//     'index' => 'key'
// ]]);