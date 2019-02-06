<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::view('about', 'frontend.about'); // This route does not require a controller method associated to it

Auth::routes();

Route::get('/',									['uses'=>'HomeController@index',				'as'=>'homepage']);
Route::get('about',								['uses'=>'HomeController@about',				'as'=>'about']);
Route::get('members',                     ['uses'=>'HomeController@members',        'as'=>'members']);
Route::get('contact',							['uses'=>'HomeController@contact',			'as'=>'contact']);
Route::post('contact',                    ['uses'=>'HomeController@postContact',    'as'=>'postContact']);


Route::get('blog/search',                 ['uses'=>'BlogController@search',         'as'=>'blog.search']);
Route::get('blog/print/{id}',             ['uses'=>'BlogController@print',          'as'=>'blog.print']);
Route::get('blog/viewImage/{id}',         ['uses'=>'BlogController@viewImage',      'as'=>'blog.viewImage']);
Route::get('blog/{year}/{month}',         ['uses'=>'BlogController@archive',        'as'=>'blog.archive']);
Route::post('blog/{id}/storeComment',     ['uses'=>'BlogController@storeComment',   'as'=>'blog.storeComment']);
Route::get('blog/{slug}',                 ['uses'=>'BlogController@getSingle',      'as'=>'blog.single'])->where('slug', '[\w\d\-\_]+');
Route::get('blog',                        ['uses'=>'BlogController@getIndex',       'as'=>'blog.index']);

Route::get('dashboard',				['uses'=>'DashboardController@index',		'as'=>'dashboard']);

// Route::get('posts/create',          ['uses'=>'PostsController@index',     'as'=>'posts.create']);


// Include all files from app\Http\routes\ folder
foreach ( File::allFiles(__DIR__.'/routes') as $partial )
{
	 require $partial->getPathname();
}