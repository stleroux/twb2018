<?php

// ALBUMS
// Route::resource('albums', 'AlbumsController');

Route::get('albums/photo/{id}',         'AlbumsController@showPhoto')         ->name('photo.show');
Route::get('photo/download/{ptf}',      'AlbumsController@download')          ->name('photo.download');
Route::get('photo/add/{album_id}',      'AlbumsController@addPhoto')          ->name('photo.add');
Route::post('photo/store',              'AlbumsController@storePhoto')        ->name('photo.store');
Route::delete('photo/{id}',             'AlbumsController@destroyPhoto')      ->name('photo.delete');

Route::get('albums/create',             'AlbumsController@create')            ->name('albums.create');
Route::get('albums/{id}/edit',          'AlbumsController@edit')              ->name('albums.edit');
Route::post('albums/{key?}',            'AlbumsController@store')             ->name('albums.store');
Route::get('albums/{id}',               'AlbumsController@show')              ->name('albums.show');
Route::get('albums/{key?}',             'AlbumsController@index')             ->name('albums.index');
Route::put('albums/update/{id}',        'AlbumsController@update')            ->name('albums.update');
Route::delete('albums/{id}',            'AlbumsController@destroy')           ->name('albums.destroy');