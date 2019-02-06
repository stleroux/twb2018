<?php

// GALLERY

Route::group(['prefix'=>'backend/gallery'], function()
{
	$c = 'Backend\GalleryController@';
	$r = 'backend.gallery.';

	Route::get('list',							['uses' => $c . 'viewGalleryList',			'as' => $r . 'list']);
	Route::post('save',							['uses' => $c . 'saveGallery',				'as' => $r . 'save']);
	Route::get('view/{id}',						['uses' => $c . 'viewGalleryPics',			'as' => $r . 'view']);
	Route::post('do-upload',					['uses' => $c . 'doImageUpload',				'as' => $r . 'do-upload']);
	Route::delete('delete/{id}',				['uses' => $c . 'deleteGallery',				'as' => $r . 'delete']);
	Route::get('edit/{id}',						['uses' => $c . 'editGallery',				'as' => $r . 'edit']);
	Route::put('{id}',							['uses' => $c . 'updateGallery',				'as' => $r . 'update']);

});