<?php

// FRONTEND PROJECTS



Route::get('woodProjects/newWoodProjects',		'WoodProjectsController@newWoodProjects')		->name('woodProjects.newWoodProjects');
Route::get('woodProjects/create',					'WoodProjectsController@create')					->name('woodProjects.create');
Route::get('woodProjects/admin',						'WoodProjectsController@admin')					->name('woodProjects.admin');
Route::get('woodProjects/{id}',						'WoodProjectsController@show')					->name('woodProjects.show');
Route::get('woodProjects/{id}/edit',				'WoodProjectsController@edit')					->name('woodProjects.edit');
Route::get('woodProjects/{pid?}',					'WoodProjectsController@index')					->name('woodProjects.index');

Route::put('woodProjects/{id}',						'WoodProjectsController@update')					->name('woodProjects.update');

Route::post('woodProjects/{id}/storeComment',	'WoodProjectsController@storeComment')			->name('woodProjects.storeComment');
Route::post('woodProjects/store',					'WoodProjectsController@store')					->name('woodProjects.store');

Route::delete('woodProjects/{id}',					'WoodProjectsController@destroy')				->name('woodProjects.destroy');




Route::get('woodProjectImages/create/{project_id}',	'WoodProjectImagesController@create')		->name('woodProjectImages.create');
Route::post('woodProjectImages/store',						'WoodProjectImagesController@store')		->name('woodProjectImages.store');
Route::get('woodProjectImages/{id}',						'WoodProjectImagesController@show')			->name('woodProjectImages.show');
Route::get('woodProjectImages/{id}/manageImages',		'WoodProjectImagesController@index')		->name('woodProjectImages.index');
Route::delete('woodProjectImages/{id}',					'WoodProjectImagesController@destroy')		->name('woodProjectImages.destroy');

// Route::get('woodProjectImage/{id}',       ['uses'=>'WoodProjectImagesController@show',   'as'=>'woodProjectImage.show']);



// // BACKEND PROJECTS
// Route::group(['prefix'=>'backend/woodProjects'], function()
// {
// 	$c = 'Backend\WoodProjectsController@';
// 	$r = 'backend.woodProjects.';

// 	Route::get('admin',							['uses'=> $c . 'admin',					'as'=> $r . 'admin']);
// 	Route::get('newWoodProjects',	         ['uses'=> $c . 'newWoodProjects',	'as'=> $r . 'newWoodProjects']	);

// 	Route::get('',									['uses'=> $c . 'index',					'as'=> $r . 'index']);
// 	Route::get('create',							['uses'=> $c . 'create',				'as'=> $r . 'create']);
// 	Route::post('store',							['uses'=> $c . 'store',					'as'=> $r . 'store']);
// 	Route::get('{id}/edit',						['uses'=> $c . 'edit',					'as'=> $r . 'edit']);
// 	Route::put('{id}',							['uses'=> $c . 'update',				'as'=> $r . 'update']);
// 	Route::get('{id}',							['uses'=> $c . 'show',					'as'=> $r . 'show']);
// 	Route::delete('{id}',						['uses'=> $c . 'destroy',				'as'=> $r . 'delete']);

// });



// // PROJECT IMAGES
// Route::group(['prefix'=>'backend/woodProjectImages'], function()
// {
// 	$c = 'Backend\WoodProjectImagesController@';
// 	$r = 'backend.woodProjectImage.';

// 	Route::get('create/{project_id}',				['uses' => $c . 'create',					'as' => $r . 'create']);
// 	Route::post('store',									['uses' => $c . 'store',					'as' => $r . 'store']);
// 	Route::get('{id}',									['uses' => $c . 'show',						'as' => $r . 'show']);
// 	Route::delete('{id}',								['uses' => $c . 'destroy',					'as' => $r . 'delete']);

// });
