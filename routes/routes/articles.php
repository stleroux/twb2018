<?php

// ARTICLES
Route::group(['prefix'=>'articles'], function () {

   Route::get('newArticles/{key?}',       'ArticlesController@newArticles')      ->name('articles.newArticles');
   // Route::get('published/{key?}',         'ArticlesController@published')        ->name('articles.published');
   Route::get('unpublished/{key?}',       'ArticlesController@unpublished')      ->name('articles.unpublished');
   Route::get('future/{key?}',            'ArticlesController@future')           ->name('articles.future');
   Route::get('myArticles/{key?}',        'ArticlesController@myArticles')       ->name('articles.myArticles');
   Route::get('showTrashed/{id}',         'ArticlesController@showTrashed')      ->name('articles.showTrashed');

   Route::get('myFavorites',              'ArticlesController@myFavorites')      ->name('articles.myFavorites');
   Route::get('trashed',                  'ArticlesController@trashed')          ->name('articles.trashed');
   Route::get('create',                   'ArticlesController@create')           ->name('articles.create');

   Route::get('{id}/addFavorite',         'ArticlesController@addFavorite')      ->name('articles.addFavorite');
   Route::get('{id}/removeFavorite',      'ArticlesController@removeFavorite')   ->name('articles.removeFavorite');
   Route::get('{id}/duplicate',           'ArticlesController@duplicate')        ->name('articles.duplicate');
   Route::get('{id}/publish',             'ArticlesController@publish')          ->name('articles.publish');
   Route::get('{id}/unpublish',           'ArticlesController@unpublish')        ->name('articles.unpublish');
   Route::get('{id}/resetViews',          'ArticlesController@resetViews')       ->name('articles.resetViews');
   Route::get('{id}/edit',                'ArticlesController@edit')             ->name('articles.edit');
   Route::get('{id}/show',                'ArticlesController@show')             ->name('articles.show');
   Route::get('/{key?}',                  'ArticlesController@index')            ->name('articles.index');

   Route::get('print/{id}',               'ArticlesController@print')            ->name('articles.print');
   Route::get('import',                   'ArticlesController@import')           ->name('articles.import');
   Route::get('downloadExcel/{type}',     'ArticlesController@downloadExcel')    ->name('articles.downloadExcel');
   Route::get('restore/{id}',             'ArticlesController@restore')          ->name('articles.restore');
   Route::get('pdfview',                  'ArticlesController@pdfview')          ->name('articles.pdfview');
   Route::get('archives/{year}/{month}',  'ArticlesController@archive')          ->name('articles.archive');

   Route::put('update/{id}',              'ArticlesController@update')           ->name('articles.update');

   Route::post('',                        'ArticlesController@store')            ->name('articles.store');
   Route::post('{id}/storeComment',       'ArticlesController@storeComment')     ->name('articles.storeComment');
   Route::post('trashAll',                'ArticlesController@trashAll')         ->name('articles.trashAll');
   Route::post('deleteAll',               'ArticlesController@deleteAll')        ->name('articles.deleteAll');
   Route::post('restoreAll',              'ArticlesController@restoreAll')       ->name('articles.restoreAll');
   Route::post('importExcel',             'ArticlesController@importExcel')      ->name('articles.importExport');
   Route::post('unpublishAll',            'ArticlesController@unpublishAll')     ->name('articles.unpublishAll');
   Route::post('publishAll',              'ArticlesController@publishAll')       ->name('articles.publishAll');

   Route::delete('{id}',                  'ArticlesController@destroy')          ->name('articles.destroy');
   Route::delete('deleteTrashed/{id}',    'ArticlesController@deleteTrashed')    ->name('articles.deleteTrashed');
});
// Route::get('articles/{key?}',                  'ArticlesController@index')            ->name('articles.index');