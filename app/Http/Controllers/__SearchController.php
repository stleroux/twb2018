<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Article;
use App\Post;
use App\Recipe;
use Session;
use Auth;
use Log;

class SearchController extends Controller
{

	// ================================================================================================================================
	// CONSTRUCT ::
	// ================================================================================================================================
	public function __construct() {
		Log::useFiles(storage_path().'/logs/search.log');
	}

	public function getPosts(Request $request)
	{
		$this->validate($request, [
			'search' => 'required'
		]);

		$search = $request->get('search');

		$posts = Post::where('title', 'like', "%$search%")
			->orWhere('body', 'like', "%$search%")
			->paginate(10)
			->appends(['search' => $search])
		;

		// Save entry to log file using built-in Monolog
		if (Auth::check()) {
			Log::info(Auth::user()->username . " (" . Auth::user()->id . ") searched posts for " . $search);
		} else {
			Log::info("Guest searched posts for \"" . $search . "\"");
		}

		return view('search.posts', compact('posts'));
	}

	public function getRecipes(Request $request)
	{
		$this->validate($request, [
			'search' => 'required'
		]);

		$search = $request->get('search');

		$recipes = Recipe::where('title', 'like', "%$search%")
			->where('personal','!=', 1)
			->orWhere('ingredients', 'like', "%$search%")
			->orWhere('methodology', 'like', "%$search%")
			->paginate(10)
			->appends(['search' => $search])
		;

		return view('search.recipes', compact('recipes'));
	}

	public function getArticles(Request $request)
	{
		$this->validate($request, [
			'search' => 'required'
		]);

		$search = $request->get('search');

		$articles = Article::where('title', 'like', "%$search%")
			->orWhere('description_eng', 'like', "%$search%")
			->orWhere('description_fre', 'like', "%$search%")
			->paginate(10)
			->appends(['search' => $search])
		;

		return view('search.articles', compact('articles'));
	}

}
