<?php

Route::group(['prefix'=>'backend/modules'], function()
{
	$c = 'Backend\ModulesController@';
	$r = 'backend.modules.';

	Route::get('{id}/delete',						['uses' => $c . 'delete',					'as' => $r . 'delete']);
	Route::get('exportPDF',							['uses' => $c . 'exportPDF',				'as' => $r . 'exportPDF']);
	Route::get('import',								['uses' => $c . 'import',					'as' => $r . 'import']);
	Route::get('downloadExcel/{type}',			['uses' => $c . 'downloadExcel',			'as' => $r . 'downloadExcel']);
	Route::post('importExcel',						['uses' => $c . 'importExcel',			'as' => $r . 'importExport']);
	Route::get('newModules',  			         ['uses' => $c . 'newModules',			   'as' => $r . 'newModules']);

	Route::get('create',								['uses' => $c . 'create',					'as' => $r . 'create']);
	Route::post('modules',							['uses' => $c . 'store',					'as' => $r . 'store']);
	Route::get('',										['uses' => $c . 'index',					'as' => $r . 'index']);
	Route::get('{id}/edit',							['uses' => $c . 'edit',						'as' => $r . 'edit']);
	Route::put('{id}',								['uses' => $c . 'update',					'as' => $r . 'update']);
	Route::delete('{id}',							['uses' => $c . 'destroy',					'as' => $r . 'destroy']);

});