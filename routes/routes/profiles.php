<?php

// PROFILE
Route::get('profile/pwdChange/{id}',      ['uses'=>'ProfileController@pwdChange',      'as'=>'profile.pwdChange']);
Route::get('profile/{id?}',               ['uses'=>'ProfileController@index',          'as'=>'profile']);
Route::get('profile/resetSettings/{id}',  ['uses'=>'ProfileController@resetSettings',  'as'=>'profile.resetSettings']);
Route::get('profile/deleteImage/{id}',    ['uses'=>'ProfileController@deleteImage',    'as'=>'profile.deleteImage']);
Route::get('profile/account/{id}',        ['uses'=>'ProfileController@acctUpdate',     'as'=>'profile.acctUpdate']);
Route::get('profile/settings/{id}',       ['uses'=>'ProfileController@settingsUpdate', 'as'=>'profile.settingsUpdate']);

Route::put('profile/{id}',                ['uses'=>'ProfileController@update',         'as'=>'profile.update']);

Route::post('profile/account/{id}',       ['uses'=>'ProfileController@updateAcct',     'as'=>'profile.updateAcct']);
Route::post('profile/changePassword',     ['uses'=>'ProfileController@changePassword', 'as'=>'profile.changePassword']);
Route::post('profile/settings/{id}',      ['uses'=>'ProfileController@updateSettings', 'as'=>'profile.updateSettings']);