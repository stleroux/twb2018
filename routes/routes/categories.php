<?php

// CATEGORIES
// Route::get('category/{id}', ['uses' => 'CategoriesController@show', 'as' => 'categories.show']);

Route::group(['prefix'=>'categories'], function()
{
	Route::get('{id}/delete',						'CategoriesController@delete')					->name('delete');
	Route::get('exportPDF',							'CategoriesController@exportPDF')				->name('exportPDF');
	Route::get('import',								'CategoriesController@import')					->name('import');
	Route::get('downloadExcel/{type}',			'CategoriesController@downloadExcel')			->name('downloadExcel');
	Route::post('importExcel',						'CategoriesController@importExcel')				->name('importExport');
	Route::get('newCategories',            	'CategoriesController@newCategories')		  ->name('newCategories');
});

Route::resource('categories', 'CategoriesController');