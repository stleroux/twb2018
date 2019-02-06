<?php
/*
|--------------------------------------------------------------------------
| COMMENTS ROUTES
|--------------------------------------------------------------------------
*/
// Route::post('comments/{post_id}', [
// 	'uses' => 'Frontend\CommentsController@store',
// 	'as' => 'comments.store',
// ]);

/*
|--------------------------------------------------------------------------
| COMMENTS ADMIN ROUTES
|--------------------------------------------------------------------------
*/
//Route::get('backend/comments/{id}',        ['uses' => 'Backend\CommentsController@show',            'as' => 'backend.comments.show']);
Route::get('backend/comment/{id}',        ['uses' => 'Backend\CommentsController@show',            'as' => 'backend.comments.show']);

Route::group(['prefix'=>'backend/comments'], function()
{
	$c = 'Backend\CommentsController@';
	$r = 'backend.comments.';

	//Route::get('{id}/delete',					['uses' => $c . 'delete',						'as' => $r . 'delete']);
	//Route::get('exportPDF',						['uses' => $c . 'exportPDF',					'as' => $r . 'exportPDF']);
	//Route::get('import',							['uses' => $c . 'import',						'as' => $r . 'import']);
	//Route::get('downloadExcel/{type}',		['uses' => $c . 'downloadExcel',				'as' => $r . 'downloadExcel']);
	//Route::post('importExcel',					['uses' => $c . 'importExcel',				'as' => $r . 'importExport']);
	Route::get('newComments',       			   ['uses' => $c . 'newComments', 			   'as' => $r . 'newComments']);

	Route::get('create',							['uses' => $c . 'create',						'as' => $r . 'create']);
	Route::post('store',							['uses' => $c . 'store',						'as' => $r . 'store']);
	Route::get('',									['uses' => $c . 'index',						'as' => $r . 'index']);
	Route::get('{id}/edit',						['uses' => $c . 'edit',							'as' => $r . 'edit']);
	Route::put('{id}',							['uses' => $c . 'update',						'as' => $r . 'update']);
	Route::delete('{id}',						['uses' => $c . 'destroy',						'as' => $r . 'destroy']);

	Route::get('{id}/print',					['uses' => $c . 'print',						'as' => $r . 'print']);

});