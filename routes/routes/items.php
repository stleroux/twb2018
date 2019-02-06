<?php

// ITEMS
// Route::group(['namespace' => 'Backend'], function() {
   //Route::get('/backend/items/import',          'Backend\ItemsController@getImport')->name('backend.items.import');
   //Route::post('/backend/items/import_parse',   'Backend\ItemsController@parseImport')->name('backend.items.import_parse');
   //Route::post('/backend/items/import_process', 'Backend\ItemsController@processImport')->name('backend.items.import_process');

   // Route::resource('items', 'Backend\ItemsController');
   //Route::get('backend/items',        'Backend\ItemsController@index')->name('backend.items.index');
// });


// Route::group(['prefix' => 'backend', 'namespace' => 'Backend'], function () {
//    Route::get('items/import', 'ItemsController@getImport')->name('items.import');
//    Route::post('items/import_parse', 'ItemsController@parseImport')->name('items.import_parse');
//    Route::post('items/import_process', 'ItemsController@processImport')->name('items.import_process');

//    Route::get('items/published', 'ItemsController@published')->name('items.published');
//    Route::get('items/unpublished', 'ItemsController@unpublished')->name('items.unpublished');
//    Route::get('items/future', 'ItemsController@future')->name('items.future');
//    Route::get('items/trashed', 'ItemsController@trashed')->name('items.trashed');
   
//    Route::resource('items', 'ItemsController');
// });

Route::resource('items', 'ItemsController');