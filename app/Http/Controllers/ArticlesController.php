<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Article;
use App\Category;
use App\Comment;
use App\User;
use Carbon\Carbon;
use Auth;
use DB;
use Excel;
use Log;
use Route;
use Session;
use URL;

use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Http\Requests\CreateCommentRequest;

class ArticlesController extends Controller
{

##################################################################################################################
#  ██████╗ ██████╗ ███╗   ██╗███████╗████████╗██████╗ ██╗   ██╗ ██████╗████████╗
# ██╔════╝██╔═══██╗████╗  ██║██╔════╝╚══██╔══╝██╔══██╗██║   ██║██╔════╝╚══██╔══╝
# ██║     ██║   ██║██╔██╗ ██║███████╗   ██║   ██████╔╝██║   ██║██║        ██║   
# ██║     ██║   ██║██║╚██╗██║╚════██║   ██║   ██╔══██╗██║   ██║██║        ██║   
# ╚██████╗╚██████╔╝██║ ╚████║███████║   ██║   ██║  ██║╚██████╔╝╚██████╗   ██║   
#  ╚═════╝ ╚═════╝ ╚═╝  ╚═══╝╚══════╝   ╚═╝   ╚═╝  ╚═╝ ╚═════╝  ╚═════╝   ╚═╝   
##################################################################################################################
	public function __construct() {
		// only allow authenticated users to access these pages
		//$this->middleware('auth', ['except'=>['index','show']]);
		// changing auth to guest would only allow guests to access these pages
		// you can also restrict the actions by adding ['except' => 'name_of_action'] at the end
		//$this->middleware('auth')->except('frontArticles', 'show');

		//Log::useFiles(storage_path().'/logs/articles.log');
		//Log::useFiles(storage_path().'/logs/audits.log');
	}


##################################################################################################################
#  █████╗ ██████╗ ██████╗     ███████╗ █████╗ ██╗   ██╗ ██████╗ ██████╗ ██╗████████╗███████╗
# ██╔══██╗██╔══██╗██╔══██╗    ██╔════╝██╔══██╗██║   ██║██╔═══██╗██╔══██╗██║╚══██╔══╝██╔════╝
# ███████║██║  ██║██║  ██║    █████╗  ███████║██║   ██║██║   ██║██████╔╝██║   ██║   █████╗  
# ██╔══██║██║  ██║██║  ██║    ██╔══╝  ██╔══██║╚██╗ ██╔╝██║   ██║██╔══██╗██║   ██║   ██╔══╝  
# ██║  ██║██████╔╝██████╔╝    ██║     ██║  ██║ ╚████╔╝ ╚██████╔╝██║  ██║██║   ██║   ███████╗
# ╚═╝  ╚═╝╚═════╝ ╚═════╝     ╚═╝     ╚═╝  ╚═╝  ╚═══╝   ╚═════╝ ╚═╝  ╚═╝╚═╝   ╚═╝   ╚══════╝
##################################################################################################################
	public function addfavorite($id)
	{
		// Pass along the ROUTE value of the previous page
		//$ref = app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName();

		$user = Auth::user()->id;
		$article = Article::find($id);

		$article->favorites()->sync([$user], false);

		Session::flash ('success','The article was successfully added to your Favorites list!');
		// return redirect()->route('articles.index');
		// return redirect()->route($ref);
		Session::flash('backUrl', \Request::fullUrl());
		
		//return redirect()->back()->withRef($ref);
		return redirect()->back();
	}


##################################################################################################################
#  █████╗ ██████╗  ██████╗██╗  ██╗██╗██╗   ██╗███████╗
# ██╔══██╗██╔══██╗██╔════╝██║  ██║██║██║   ██║██╔════╝
# ███████║██████╔╝██║     ███████║██║██║   ██║█████╗  
# ██╔══██║██╔══██╗██║     ██╔══██║██║╚██╗ ██╔╝██╔══╝  
# ██║  ██║██║  ██║╚██████╗██║  ██║██║ ╚████╔╝ ███████╗
# ╚═╝  ╚═╝╚═╝  ╚═╝ ╚═════╝╚═╝  ╚═╝╚═╝  ╚═══╝  ╚══════╝
# Display the archived resources
##################################################################################################################
	public function archive($year, $month)
	{

		// Get list of articles by year and month
		$articlelinks = DB::table('articles')
			->select(DB::raw('YEAR(created_at) year, MONTH(created_at) month, MONTHNAME(created_at) month_name, COUNT(*) article_count'))
			->where('published_at', '<=', Carbon::now())
			//->where('created_at', '<=', Carbon::now()->subMonth(3))
			->groupBy('year')
			->groupBy('month')
			->orderBy('year', 'desc')
			->orderBy('month', 'desc')
			->get();

		$archives = Article::with('user')->whereYear('created_at','=', $year)
			->whereMonth('created_at','=', $month)
			->where('published_at', '<=', Carbon::now())
			->get();

		// Set the variable so we can use a button in other pages to come back to this page
		Session::flash('archiveUrl', \Request::fullUrl());
		//Session::put('archiveUrl', \Request::fullUrl());
		//Session::flush('archiveUrl');

		return view('articles.archive', compact('archives','articlelinks'))->withYear($year)->withMonth($month);
	}


##################################################################################################################
#  ██████╗██████╗ ███████╗ █████╗ ████████╗███████╗
# ██╔════╝██╔══██╗██╔════╝██╔══██╗╚══██╔══╝██╔════╝
# ██║     ██████╔╝█████╗  ███████║   ██║   █████╗  
# ██║     ██╔══██╗██╔══╝  ██╔══██║   ██║   ██╔══╝  
# ╚██████╗██║  ██║███████╗██║  ██║   ██║   ███████╗
#  ╚═════╝╚═╝  ╚═╝╚══════╝╚═╝  ╚═╝   ╚═╝   ╚══════╝
// Show the form for creating a new resource
##################################################################################################################
	public function create()
	{
		if(!checkACL('author')) {
		    return view('errors.403');
		}

		// Set the variable so we can use a button in other pages to come back to this page
		if(app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'articles.index') {
			Session::put('backURL', 'articles.index');
		}
		if(app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'articles.newArticles') {
			Session::put('backURL', 'articles.newArticles');
		}
		if(app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'articles.myArticles') {
			Session::put('backURL', 'articles.myArticles');
		}
		if(app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'articles.myFavorites') {
			Session::put('backURL', 'articles.myFavorites');
		}
		if(app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'articles.unpublished') {
			Session::put('backURL', 'articles.unpublished');
		}
		if(app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'articles.future') {
			Session::put('backURL', 'articles.future');
		}
		if(app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'articles.trashed') {
			Session::put('backURL', 'articles.trashed');
		}

		// find all categories in the categories table and pass them to the view
		$categories = Category::whereHas('module', function ($query) {
			$query->where('name', '=', 'articles');
		})->orderBy('name','asc')->get();

		// Create an empty array to store the categories
		$cats = [];

		// Store the category values into the $cats array
		foreach ($categories as $category) {
			$cats[$category->id] = $category->name;
		}

		return view('articles.create')->withCategories($cats);
	}


##################################################################################################################
# ██████╗ ███████╗██╗     ███████╗████████╗███████╗     █████╗ ██╗     ██╗     
# ██╔══██╗██╔════╝██║     ██╔════╝╚══██╔══╝██╔════╝    ██╔══██╗██║     ██║     
# ██║  ██║█████╗  ██║     █████╗     ██║   █████╗      ███████║██║     ██║     
# ██║  ██║██╔══╝  ██║     ██╔══╝     ██║   ██╔══╝      ██╔══██║██║     ██║     
# ██████╔╝███████╗███████╗███████╗   ██║   ███████╗    ██║  ██║███████╗███████╗
# ╚═════╝ ╚══════╝╚══════╝╚══════╝   ╚═╝   ╚══════╝    ╚═╝  ╚═╝╚══════╝╚══════╝
// Mass Delete selected rows - all selected records
##################################################################################################################
	public function deleteAll(Request $request)
	{
		// Pass along the ROUTE value of the previous page
		//$ref = app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName();

		//dd('TEST_DELETE');
		$this->validate($request, [
			'checked' => 'required',
		]);
		//dd('TEST_DELETE');

		$checked = $request->input('checked');
		//dd($checked);

		// $article = Article::withTrashed()->findOrFail($checked);
		//Article::destroy($checked);
		Article::whereIn('id', $checked)->forceDelete();

		Session::flash('success','The selected articles were deleted successfully.');
		//return redirect()->route($ref);
		return redirect()->back();
	}


##################################################################################################################
# ██████╗ ███████╗██╗     ███████╗████████╗███████╗    ████████╗██████╗  █████╗ ███████╗██╗  ██╗███████╗██████╗ 
# ██╔══██╗██╔════╝██║     ██╔════╝╚══██╔══╝██╔════╝    ╚══██╔══╝██╔══██╗██╔══██╗██╔════╝██║  ██║██╔════╝██╔══██╗
# ██║  ██║█████╗  ██║     █████╗     ██║   █████╗         ██║   ██████╔╝███████║███████╗███████║█████╗  ██║  ██║
# ██║  ██║██╔══╝  ██║     ██╔══╝     ██║   ██╔══╝         ██║   ██╔══██╗██╔══██║╚════██║██╔══██║██╔══╝  ██║  ██║
# ██████╔╝███████╗███████╗███████╗   ██║   ███████╗       ██║   ██║  ██║██║  ██║███████║██║  ██║███████╗██████╔╝
# ╚═════╝ ╚══════╝╚══════╝╚══════╝   ╚═╝   ╚══════╝       ╚═╝   ╚═╝  ╚═╝╚═╝  ╚═╝╚══════╝╚═╝  ╚═╝╚══════╝╚═════╝ 
// Remove the specified resource from storage - individual record
##################################################################################################################
	public static function deleteTrashed($id)
	{
		// if(!checkACL('manager')) {
			// return view('errors.403');
		// }
		//dd($id);
		$article = Article::withTrashed()->findorFail($id);
		//dd($article);
		$article->forceDelete();

		Session::flash ('success','The article was deleted successfully.');
		return redirect()->route('articles.trashed');
	}


##################################################################################################################
# ██████╗ ███████╗███████╗████████╗██████╗  ██████╗ ██╗   ██╗
# ██╔══██╗██╔════╝██╔════╝╚══██╔══╝██╔══██╗██╔═══██╗╚██╗ ██╔╝
# ██║  ██║█████╗  ███████╗   ██║   ██████╔╝██║   ██║ ╚████╔╝ 
# ██║  ██║██╔══╝  ╚════██║   ██║   ██╔══██╗██║   ██║  ╚██╔╝  
# ██████╔╝███████╗███████║   ██║   ██║  ██║╚██████╔╝   ██║   
# ╚═════╝ ╚══════╝╚══════╝   ╚═╝   ╚═╝  ╚═╝ ╚═════╝    ╚═╝   
// Remove the specified resource from storage
// Used in the index page and trashAll action to soft delete multiple records
##################################################################################################################
	public function destroy($id)
	{
		// if(!checkACL('author')) {
		//     return view('errors.403');
		// }

		// Pass along the ROUTE value of the previous page
		//$ref = app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName();

		$article = Article::findOrFail($id);
			$article->published_at = Null;
				// Delete related favorites
				$favorites = DB::select('select * from article_user where article_id = '. $id, [1]);
				//dd($favorites);
				  foreach($favorites as $favorite) {
					$article->favorites()->detach($favorite);
				  }
			$article->save();
		$article->delete();

		// Save entry to log file using built-in Monolog
		//Log::info(Auth::user()->username . " (" . Auth::user()->id . ") DELETED article (" . $article->id . ")\r\n",
		//    [json_decode($article, true)]
		//);

		Session::flash('success','The article was trashed successfully.');
		//return redirect()->route($ref);
		//return redirect()->route($request->ref);
		//return redirect()->route('backend.articles.index');
		//return redirect()->back();
		//return redirect()->route('articles.index');
		return redirect(Route( Session::get('backURL')));
	}


##################################################################################################################
# ██████╗  ██████╗ ██╗    ██╗███╗   ██╗██╗      ██████╗  █████╗ ██████╗     ███████╗██╗  ██╗ ██████╗███████╗██╗     
# ██╔══██╗██╔═══██╗██║    ██║████╗  ██║██║     ██╔═══██╗██╔══██╗██╔══██╗    ██╔════╝╚██╗██╔╝██╔════╝██╔════╝██║     
# ██║  ██║██║   ██║██║ █╗ ██║██╔██╗ ██║██║     ██║   ██║███████║██║  ██║    █████╗   ╚███╔╝ ██║     █████╗  ██║     
# ██║  ██║██║   ██║██║███╗██║██║╚██╗██║██║     ██║   ██║██╔══██║██║  ██║    ██╔══╝   ██╔██╗ ██║     ██╔══╝  ██║     
# ██████╔╝╚██████╔╝╚███╔███╔╝██║ ╚████║███████╗╚██████╔╝██║  ██║██████╔╝    ███████╗██╔╝ ██╗╚██████╗███████╗███████╗
# ╚═════╝  ╚═════╝  ╚══╝╚══╝ ╚═╝  ╚═══╝╚══════╝ ╚═════╝ ╚═╝  ╚═╝╚═════╝     ╚══════╝╚═╝  ╚═╝ ╚═════╝╚══════╝╚══════╝
##################################################################################################################
	public function downloadExcel($type)
	{
		if(!checkACL('manager')) {
			return view('errors.403');
		}

		if(app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'articles.index') {
				$data = Article::published()->get()->toArray();
		}
		if(app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'articles.newArticles') {
				$data = Article::newArticles()->get()->toArray();
		}
		if(app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'articles.myArticles') {
				$data = Article::myArticles()->get()->toArray();
		}
		if(app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'articles.unpublished') {
				$data = Article::unpublished()->get()->toArray();
		}
		if(app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'articles.future') {
				$data = Article::future()->get()->toArray();
		}
		if(app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'articles.trashed') {
				$data = Article::trashedCount()->get()->toArray();
		}

		// $referrer = request()->headers->get('referer');
		// //dd($referrer);
		// if ($referrer == 'http://localhost:8000/backend/articles/myArticles') {
		// 	$data = Article::myArticles()->get()->toArray();
		// } elseif ($referrer == 'http://localhost:8000/backend/articles/published'){
		//    $data = Article::published()->get()->toArray();
		// } else {
		// 	$data = Article::get()->toArray();
		// }

		// Save entry to log file of failure
		//Log::info(Auth::user()->username . " (" . Auth::user()->id . ") downloaded :: articles");


		return Excel::create('Articles_List', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
			{
				$sheet->fromArray($data);
			});
		})->download($type);
	}


##################################################################################################################
# ██████╗ ██╗   ██╗██████╗ ██╗     ██╗ ██████╗ █████╗ ████████╗███████╗
# ██╔══██╗██║   ██║██╔══██╗██║     ██║██╔════╝██╔══██╗╚══██╔══╝██╔════╝
# ██║  ██║██║   ██║██████╔╝██║     ██║██║     ███████║   ██║   █████╗  
# ██║  ██║██║   ██║██╔═══╝ ██║     ██║██║     ██╔══██║   ██║   ██╔══╝  
# ██████╔╝╚██████╔╝██║     ███████╗██║╚██████╗██║  ██║   ██║   ███████╗
# ╚═════╝  ╚═════╝ ╚═╝     ╚══════╝╚═╝ ╚═════╝╚═╝  ╚═╝   ╚═╝   ╚══════╝
// DUPLICATE :: Duplicate the specified resource in storage.
##################################################################################################################
	public function duplicate($id)
	{
		//if(!checkACL('manager')) {
		//  // Save entry to log file of failure
		//  Log::warning(Auth::user()->username . " (" . Auth::user()->id . ") tried to access :: Articles / Duplicate");
		//  return view('errors.403');
		//}

		// Pass along the ROUTE value of the previous page
		$ref = app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName();

		$article = Article::find($id);
		  $newArticle = $article->replicate();
		  $newArticle->user_id = Auth::user()->id;
		$newArticle->save();

		// change the user_id field to be that of the user that is currently logged in
		
		//$newArticle->views = 0;
		//$newArticle->save();

		// Save entry to log file using built-in Monolog
		//Log::info(Auth::user()->username . " (" . Auth::user()->id . ") duplicated :: article " . $article->id . " to article ". $newArticle->id);

		Session::flash ('success','The article was duplicated successfully!');
		//return redirect()->route($ref);
		return redirect()->back();

	}


##################################################################################################################
# ███████╗██████╗ ██╗████████╗
# ██╔════╝██╔══██╗██║╚══██╔══╝
# █████╗  ██║  ██║██║   ██║   
# ██╔══╝  ██║  ██║██║   ██║   
# ███████╗██████╔╝██║   ██║   
# ╚══════╝╚═════╝ ╚═╝   ╚═╝   
// Show the form for editing the specified resource
##################################################################################################################
	public function edit($id)
	{
		if(!checkACL('author')) {
			return view('errors.403');
		}

		// Find the article to edit
		$article = Article::findOrFail($id);

		// find all categories in the categories table and pass them to the view
		$categories = Category::whereHas('module', function ($query) {
			$query->where('name', '=', 'articles');
		})->get();

		// Create an empty array to store the categories
		$cats = [];
		// Store the category values into the $cats array
		foreach ($categories as $category) {
			$cats[$category->id] = $category->name;
		}

		return view('articles.edit', compact('article'))->withCategories($cats);
	}


##################################################################################################################
# ███████╗██╗   ██╗████████╗██╗   ██╗██████╗ ███████╗
# ██╔════╝██║   ██║╚══██╔══╝██║   ██║██╔══██╗██╔════╝
# █████╗  ██║   ██║   ██║   ██║   ██║██████╔╝█████╗  
# ██╔══╝  ██║   ██║   ██║   ██║   ██║██╔══██╗██╔══╝  
# ██║     ╚██████╔╝   ██║   ╚██████╔╝██║  ██║███████╗
# ╚═╝      ╚═════╝    ╚═╝    ╚═════╝ ╚═╝  ╚═╝╚══════╝
// Display a list of resources that will be published at a later date
##################################################################################################################
	public function future(Request $request, $key=null)
	{
		if(!checkACL('publisher')) {
			return view('errors.403');
		}

		// Set the variable so we can use a button in other pages to come back to this page
		Session::put('backURL', Route::currentRouteName());

		//$alphas = range('A', 'Z');
		$alphas = DB::table('articles')
			->select(DB::raw('DISTINCT LEFT(title, 1) as letter'))
			// ->where('personal', '!=', 1)
			->where('published_at','>', Carbon::Now())
			->orderBy('letter')
			->get();
			//dd($alphas);

		$letters = [];
		foreach($alphas as $alpha) {
			$letters[] = $alpha->letter;
		}

		// If $key value is passed
		if ($key) {
			$articles = Article::with('user','category')->future()
				->where('title', 'like', $key . '%')
				->orderBy('title', 'asc')
				->get();
			return view('articles.future', compact('articles','letters'));
		}

		// No $key value is passed
		$articles = Article::with('user','category')->future()->get();
		return view('articles.future', compact('articles','letters'));
	}


##################################################################################################################
# ██╗███╗   ███╗██████╗  ██████╗ ██████╗ ████████╗
# ██║████╗ ████║██╔══██╗██╔═══██╗██╔══██╗╚══██╔══╝
# ██║██╔████╔██║██████╔╝██║   ██║██████╔╝   ██║   
# ██║██║╚██╔╝██║██╔═══╝ ██║   ██║██╔══██╗   ██║   
# ██║██║ ╚═╝ ██║██║     ╚██████╔╝██║  ██║   ██║   
# ╚═╝╚═╝     ╚═╝╚═╝      ╚═════╝ ╚═╝  ╚═╝   ╚═╝   
// IMPORT :: Show the form for importing entries to storage.
##################################################################################################################
	public function import()
	{
		if(!checkACL('manager')) {
			return view('errors.403');
		}

		// Pass along the ROUTE value of the previous page
		$ref = app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName();

		// Save entry to log file of failure
		//Log::warning(Auth::user()->username . " (" . Auth::user()->id . ") accessed :: Articles / Import");

		return view('articles.import')->withRef($ref);
	}


##################################################################################################################
# ██╗███╗   ███╗██████╗  ██████╗ ██████╗ ████████╗    ███████╗██╗   ██╗███╗   ██╗ ██████╗████████╗██╗ ██████╗ ███╗   ██╗
# ██║████╗ ████║██╔══██╗██╔═══██╗██╔══██╗╚══██╔══╝    ██╔════╝██║   ██║████╗  ██║██╔════╝╚══██╔══╝██║██╔═══██╗████╗  ██║
# ██║██╔████╔██║██████╔╝██║   ██║██████╔╝   ██║       █████╗  ██║   ██║██╔██╗ ██║██║        ██║   ██║██║   ██║██╔██╗ ██║
# ██║██║╚██╔╝██║██╔═══╝ ██║   ██║██╔══██╗   ██║       ██╔══╝  ██║   ██║██║╚██╗██║██║        ██║   ██║██║   ██║██║╚██╗██║
# ██║██║ ╚═╝ ██║██║     ╚██████╔╝██║  ██║   ██║       ██║     ╚██████╔╝██║ ╚████║╚██████╗   ██║   ██║╚██████╔╝██║ ╚████║
# ╚═╝╚═╝     ╚═╝╚═╝      ╚═════╝ ╚═╝  ╚═╝   ╚═╝       ╚═╝      ╚═════╝ ╚═╝  ╚═══╝ ╚═════╝   ╚═╝   ╚═╝ ╚═════╝ ╚═╝  ╚═══╝
##################################################################################################################
	public function importExcel()
	{
		// if(!checkACL('manager')) {
		//   // Save entry to log file of failure
		//   Log::warning(Auth::user()->username . " (" . Auth::user()->id . ") tried to access :: Admin / Articles / Import");
		//   return view('errors.403');
		// }

		if(Input::hasFile('import_file')) {
				$path = Input::file('import_file')->getRealPath();
				$data = Excel::load($path, function($reader) {
			})->get();

			if(!empty($data) && $data->count()) {
				foreach ($data as $key => $value) {
					$insert[] = [
						'user_id'				=> $value->user_id,
						'category_id'			=> $value->category_id,
						'title'					=> $value->title,            
						'description_eng'		=> $value->description_eng,
						'description_fre'		=> $value->description_fre,
						'views'					=>  0,
						'deleted_at'			=> $value->deleted_at,
						'published_at'			=> $value->published_at,
						'created_at'			=> $value->created_at,
						'updated_at'			=> $value->updated_at,
					];
				}

				if(!empty($insert)) {
					DB::table('articles')->insert($insert);

					// Save entry to log file of failure
					//Log::warning(Auth::user()->username . " (" . Auth::user()->id . ") imported :: articles");

					Session::flash('success', $data->count() . ' articles imported successfully!');
					return redirect()->route('articles.index');
				}
			}
		}
		return back();
	}


##################################################################################################################
# ██╗███╗   ██╗██████╗ ███████╗██╗  ██╗
# ██║████╗  ██║██╔══██╗██╔════╝╚██╗██╔╝
# ██║██╔██╗ ██║██║  ██║█████╗   ╚███╔╝ 
# ██║██║╚██╗██║██║  ██║██╔══╝   ██╔██╗ 
# ██║██║ ╚████║██████╔╝███████╗██╔╝ ██╗
# ╚═╝╚═╝  ╚═══╝╚═════╝ ╚══════╝╚═╝  ╚═╝
// Display a list of resources
##################################################################################################################
	public function index(Request $request, $key=null)
	{
		// if(!checkACL('guest')) {
		//     return view('errors.403');
		// }

		//dd($key);

		// Set the variable so we can use a button in other pages to come back to this page
		Session::put('backURL', Route::currentRouteName());
		

		// Get list of articles by year and month
		$articlelinks = DB::table('articles')
			->select(DB::raw('YEAR(created_at) year, MONTH(created_at) month, MONTHNAME(created_at) month_name, COUNT(*) article_count'))
			->where('published_at', '<=', Carbon::now())
			//->where('created_at', '<=', Carbon::now()->subMonth(3))
			->groupBy('year')->groupBy('month')->orderBy('year', 'desc')->orderBy('month', 'desc')->get();

		//$alphas = range('A', 'Z');
		$alphas = DB::table('articles')
			->select(DB::raw('DISTINCT LEFT(title, 1) as letter'))
			->where('published_at','<', Carbon::Now())
			//->where('deleted_at', '=', Null)
			->orderBy('letter')
			->get();

		$letters = [];
		foreach($alphas as $alpha) {
			$letters[] = $alpha->letter;
		}
		//dd($letters);

		// If $key value is passed
		if ($key) {
			$articles = Article::with('user','category')->published()
				->where('title', 'like', $key . '%')
				->orderBy('title', 'asc')
				->get();
			//dd($articles);
			return view('articles.index', compact('articles','letters', 'articlelinks'));
		}

		// No $key value is passed
		$articles = Article::with('user','category')->published()->get();
		//dd($articles);
		return view('articles.index', compact('articles','letters', 'articlelinks'));
	}


##################################################################################################################
# ███╗   ███╗ █████╗ ██╗  ██╗███████╗    ██████╗ ██████╗ ██╗██╗   ██╗ █████╗ ████████╗███████╗
# ████╗ ████║██╔══██╗██║ ██╔╝██╔════╝    ██╔══██╗██╔══██╗██║██║   ██║██╔══██╗╚══██╔══╝██╔════╝
# ██╔████╔██║███████║█████╔╝ █████╗      ██████╔╝██████╔╝██║██║   ██║███████║   ██║   █████╗  
# ██║╚██╔╝██║██╔══██║██╔═██╗ ██╔══╝      ██╔═══╝ ██╔══██╗██║╚██╗ ██╔╝██╔══██║   ██║   ██╔══╝  
# ██║ ╚═╝ ██║██║  ██║██║  ██╗███████╗    ██║     ██║  ██║██║ ╚████╔╝ ██║  ██║   ██║   ███████╗
# ╚═╝     ╚═╝╚═╝  ╚═╝╚═╝  ╚═╝╚══════╝    ╚═╝     ╚═╝  ╚═╝╚═╝  ╚═══╝  ╚═╝  ╚═╝   ╚═╝   ╚══════╝
##################################################################################################################
	public function makeprivate($id)
	{
		// Pass along the ROUTE value of the previous page
		//$ref = app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName();

		$article = Article::find($id);
			$article->personal = 1;
		$article->save();

		// Save entry to log file using built-in Monolog
		//Log::info(Auth::user()->username . " (" . Auth::user()->id . ") MADE recipe (" . $recipe->id . ") PRIVATE \r\n", [json_decode($recipe, true)]);

		Session::flash('success','The article was made private successfully');
		//return redirect()->route($ref);
		return redirect()->back();
	}


##################################################################################################################
# ███╗   ███╗██╗   ██╗     █████╗ ██████╗ ████████╗██╗ ██████╗██╗     ███████╗███████╗
# ████╗ ████║╚██╗ ██╔╝    ██╔══██╗██╔══██╗╚══██╔══╝██║██╔════╝██║     ██╔════╝██╔════╝
# ██╔████╔██║ ╚████╔╝     ███████║██████╔╝   ██║   ██║██║     ██║     █████╗  ███████╗
# ██║╚██╔╝██║  ╚██╔╝      ██╔══██║██╔══██╗   ██║   ██║██║     ██║     ██╔══╝  ╚════██║
# ██║ ╚═╝ ██║   ██║       ██║  ██║██║  ██║   ██║   ██║╚██████╗███████╗███████╗███████║
# ╚═╝     ╚═╝   ╚═╝       ╚═╝  ╚═╝╚═╝  ╚═╝   ╚═╝   ╚═╝ ╚═════╝╚══════╝╚══════╝╚══════╝
// Display a listing of the resource that belong to a specific user.
##################################################################################################################
	public function myArticles(Request $request, $key=null)
	{
		if(!checkACL('author')) {
			return view('errors.403');
		}

		// Set the variable so we can use a button in other pages to come back to this page
		Session::put('backURL', Route::currentRouteName());

		//$alphas = range('A', 'Z');
		$alphas = DB::table('articles')
			->select(DB::raw('DISTINCT LEFT(title, 1) as letter'))
			->where('user_id', '=', Auth::user()->id)
			// ->where('personal', '!=', 1)
			// ->where('published_at','!=', null)
			->where('deleted_at', '=', NULL)
			->orderBy('letter')
			->get();
		//dd($alphas);

		$letters = [];
		foreach($alphas as $alpha) {
		  $letters[] = $alpha->letter;
		}

		// If $key value is passed
		if ($key) {
			$articles = Article::with('user','category')->myArticles()
				->where('title', 'like', $key . '%')
				->get();
			return view('articles.myArticles', compact('articles','letters'));
		}

		$articles = Article::with('user','category')->myArticles()->get();
		return view('articles.myArticles', compact('articles','letters'));
	}


##################################################################################################################
# ███╗   ███╗██╗   ██╗    ███████╗ █████╗ ██╗   ██╗ ██████╗ ██████╗ ██╗████████╗███████╗███████╗
# ████╗ ████║╚██╗ ██╔╝    ██╔════╝██╔══██╗██║   ██║██╔═══██╗██╔══██╗██║╚══██╔══╝██╔════╝██╔════╝
# ██╔████╔██║ ╚████╔╝     █████╗  ███████║██║   ██║██║   ██║██████╔╝██║   ██║   █████╗  ███████╗
# ██║╚██╔╝██║  ╚██╔╝      ██╔══╝  ██╔══██║╚██╗ ██╔╝██║   ██║██╔══██╗██║   ██║   ██╔══╝  ╚════██║
# ██║ ╚═╝ ██║   ██║       ██║     ██║  ██║ ╚████╔╝ ╚██████╔╝██║  ██║██║   ██║   ███████╗███████║
# ╚═╝     ╚═╝   ╚═╝       ╚═╝     ╚═╝  ╚═╝  ╚═══╝   ╚═════╝ ╚═╝  ╚═╝╚═╝   ╚═╝   ╚══════╝╚══════╝
// MY FAVORITES :: Display a listing of the resource that have been favorited by a specific user.
##################################################################################################################
	public function myFavorites()
	{

		if(!checkACL('user')) {
			return view('errors.403');
		}

		// Set the variable so we can use a button in other pages to come back to this page
		Session::put('backURL', Route::currentRouteName());

		// $alphas = DB::table('recipes')
		//   ->select(DB::raw('DISTINCT LEFT(title, 1) as letter'))
		//   //->where('user_id','=',Auth::user()->id)
		//   ->where('user_id','=',-1)
		//   ->orderBy('letter')
		//   ->get();
		// //dd($alphas);

		//$letters = [];
		//   foreach($alphas as $alpha) {
		//     $letters[] = $alpha->letter;
		//   }
		// //dd($letters);

		// find the favorites
		$favs = DB::table('article_user')->where('user_id','=',Auth::user()->id)->get();
		//dd($favs);
		//$favs = Recipe::with('user','category')->where('recipe_user.user_id','=',Auth::user()->id)->get();
		//$recipes = Recipe::with('user','category')->where('user_id','=', Auth::user()->id)->orderBy('title', 'asc')->get();

		// // Create an empty array to store the recipes        
		$articles = [];

		// // Store the recipe values into the $recipes array
		foreach ($favs as $fav)
		{
		  $articles[$fav->id] = Article::with('user','category')->find($fav->article_id);
		}
		//dd($articles);
		// // Sort the recipes array by title
		$articles = array_values(array_sort($articles, function ($value) {
			return $value['title'];
		}));
		//dd($articles);
		// return view('recipes.viewfavorites')->withRecipes($recipes);
		//return view('recipes.myFavorites', compact('recipes','letters'));
		//return view('recipes.index', compact('recipes','letters'));
		return view('articles.myFavorites', compact('articles'));
	}


##################################################################################################################
# ███╗   ██╗███████╗██╗    ██╗     █████╗ ██████╗ ████████╗██╗ ██████╗██╗     ███████╗███████╗
# ████╗  ██║██╔════╝██║    ██║    ██╔══██╗██╔══██╗╚══██╔══╝██║██╔════╝██║     ██╔════╝██╔════╝
# ██╔██╗ ██║█████╗  ██║ █╗ ██║    ███████║██████╔╝   ██║   ██║██║     ██║     █████╗  ███████╗
# ██║╚██╗██║██╔══╝  ██║███╗██║    ██╔══██║██╔══██╗   ██║   ██║██║     ██║     ██╔══╝  ╚════██║
# ██║ ╚████║███████╗╚███╔███╔╝    ██║  ██║██║  ██║   ██║   ██║╚██████╗███████╗███████╗███████║
# ╚═╝  ╚═══╝╚══════╝ ╚══╝╚══╝     ╚═╝  ╚═╝╚═╝  ╚═╝   ╚═╝   ╚═╝ ╚═════╝╚══════╝╚══════╝╚══════╝
// Display a listing of the resource that were created since the user's last login.
##################################################################################################################
   public function newArticles(Request $request, $key=null)
   {
		if(!checkACL('user')) {
			return view('errors.403');
		}

		// Set the variable so we can use a button in other pages to come back to this page
		Session::put('backURL', Route::currentRouteName());

      //$alphas = range('A', 'Z');
      $alphas = DB::table('articles')
         ->select(DB::raw('DISTINCT LEFT(title, 1) as letter'))
         ->where('created_at', '>=' , Auth::user()->last_login_date)
         //->where('user_id', '=', Auth::user()->id)
         // ->where('personal', '!=', 1)
         // ->where('published_at','!=', null)
         ->orderBy('letter')
         ->get();
      //dd($alphas);

      $letters = [];
      foreach($alphas as $alpha) {
        $letters[] = $alpha->letter;
      }

      // If $key value is passed
      if ($key) {
         $articles = Article::with('user','category')->newArticles()
            ->where('title', 'like', $key . '%')
            ->get();
         return view('articles.newArticles', compact('articles','letters'));
      }

      $articles = Article::with('user','category')->newarticles()->get();
      return view('articles.newArticles', compact('articles','letters'));
   }


##################################################################################################################
# ██████╗ ██████╗ ███████╗    ██╗   ██╗██╗███████╗██╗    ██╗
# ██╔══██╗██╔══██╗██╔════╝    ██║   ██║██║██╔════╝██║    ██║
# ██████╔╝██║  ██║█████╗      ██║   ██║██║█████╗  ██║ █╗ ██║
# ██╔═══╝ ██║  ██║██╔══╝      ╚██╗ ██╔╝██║██╔══╝  ██║███╗██║
# ██║     ██████╔╝██║          ╚████╔╝ ██║███████╗╚███╔███╔╝
# ╚═╝     ╚═════╝ ╚═╝           ╚═══╝  ╚═╝╚══════╝ ╚══╝╚══╝ 
// 
##################################################################################################################
	// public function exportPDF()
	// {
	//   // if(!checkACL('manager')) {
	//   //   return view('errors.403');
	//   // }

	//   $data = Article::get()->toArray();
	//   return Excel::create('Articles_List', function($excel) use ($data) {
	//     $excel->sheet('mySheet', function($sheet) use ($data)
	//     {
	//       $sheet->fromArray($data);
	//     });
	//   })->download("pdf");
	// }

	// public function downloadPDF()
	// {
	//   $pdf = PDF::loadView('backend.articles.pdfView');
	//   return $pdf->download('articles.pdf');
	// }

	public function pdfview(Request $request)
	{
		if(!checkACL('manager')) {
			return view('errors.403');
		}

		if(app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'articles.newArticles') {
				$data = Article::newArticles()->get();
		}
		if(app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'articles.published') {
				$data = Article::published()->get();
		}
		if(app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'articles.myArticles') {
				$data = Article::myArticles()->get();
		}
		if(app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'articles.unpublished') {
				$data = Article::unpublished()->get();
		}
		if(app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'articles.future') {
				$data = Article::future()->get();
		}
		if(app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'articles.trashed') {
				$data = Article::trashedCount()->get();
		}

		view()->share('articles',$data);

		if($request->has('download')){
			$pdf = PDF::loadView('articles.pdfDownload');
			//$pdf->setPaper('A4', 'landscape');
			return $pdf->download('articles.pdf');
		}

		return view('articles.pdfPreview');
	}


##################################################################################################################
# ██████╗ ██████╗ ██╗███╗   ██╗████████╗
# ██╔══██╗██╔══██╗██║████╗  ██║╚══██╔══╝
# ██████╔╝██████╔╝██║██╔██╗ ██║   ██║   
# ██╔═══╝ ██╔══██╗██║██║╚██╗██║   ██║   
# ██║     ██║  ██║██║██║ ╚████║   ██║   
# ╚═╝     ╚═╝  ╚═╝╚═╝╚═╝  ╚═══╝   ╚═╝   
##################################################################################################################
	public function print($id)
	{
		if(!checkACL('author')) {
			return view('errors.403');
		}

		$article = Article::find($id);

		// Save entry to log file using built-in Monolog
		// Log::info(Auth::user()->username . " (" . Auth::user()->id . ") PRINTED article (" . $article->id . ")\r\n", 
		// 	[json_decode($article, true)]
		// );

		return view('articles.print')->withArticle($article);
	}


##################################################################################################################
# ██████╗ ██╗   ██╗██████╗ ██╗     ██╗███████╗██╗  ██╗
# ██╔══██╗██║   ██║██╔══██╗██║     ██║██╔════╝██║  ██║
# ██████╔╝██║   ██║██████╔╝██║     ██║███████╗███████║
# ██╔═══╝ ██║   ██║██╔══██╗██║     ██║╚════██║██╔══██║
# ██║     ╚██████╔╝██████╔╝███████╗██║███████║██║  ██║
# ╚═╝      ╚═════╝ ╚═════╝ ╚══════╝╚═╝╚══════╝╚═╝  ╚═╝
##################################################################################################################
	public function publish($id)
	{
		// Pass along the ROUTE value of the previous page
		//$ref = app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName();

		$article = Article::withTrashed()->find($id);
		//dd($id);
			//dd($article);
		  //$article->published = 1;
		  $article->published_at = Carbon::now();
		  $article->deleted_at = Null;
		$article->save();

		Session::flash ('success','The article was published successfully!');
		// return redirect()->route($ref);
		return redirect()->back();
		// return redirect()->route('articles.trashed');

	}


##################################################################################################################
# ██████╗ ██╗   ██╗██████╗ ██╗     ██╗███████╗██╗  ██╗███████╗██████╗ 
# ██╔══██╗██║   ██║██╔══██╗██║     ██║██╔════╝██║  ██║██╔════╝██╔══██╗
# ██████╔╝██║   ██║██████╔╝██║     ██║███████╗███████║█████╗  ██║  ██║
# ██╔═══╝ ██║   ██║██╔══██╗██║     ██║╚════██║██╔══██║██╔══╝  ██║  ██║
# ██║     ╚██████╔╝██████╔╝███████╗██║███████║██║  ██║███████╗██████╔╝
# ╚═╝      ╚═════╝ ╚═════╝ ╚══════╝╚═╝╚══════╝╚═╝  ╚═╝╚══════╝╚═════╝ 
##################################################################################################################
	public function published(Request $request, $key=null)
	{
		// if(!checkACL('user')) {
		// 	return view('errors.403');
		// }

		//$alphas = range('A', 'Z');
		  $alphas = DB::table('articles')
			->select(DB::raw('DISTINCT LEFT(title, 1) as letter'))
			->where('published_at','<', Carbon::Now())
			->where('deleted_at','=', Null)
			->orderBy('letter')
			->get();

		$letters = [];
		foreach($alphas as $alpha) {
		  $letters[] = $alpha->letter;
		}

		// If $key value is passed
		if ($key) {
			$articles = Article::with('user','category')->published()
				->where('title', 'like', $key . '%')
				->orderBy('title', 'asc')
				->get();
			return view('articles.published', compact('articles','letters'));
		}

		// No $key value is passed
		$articles = Article::with('user','category')->published()->get();
		return view('articles.published', compact('articles','letters'));
	}


##################################################################################################################
# ██████╗ ██╗   ██╗██████╗ ██╗     ██╗███████╗██╗  ██╗     █████╗ ██╗     ██╗     
# ██╔══██╗██║   ██║██╔══██╗██║     ██║██╔════╝██║  ██║    ██╔══██╗██║     ██║     
# ██████╔╝██║   ██║██████╔╝██║     ██║███████╗███████║    ███████║██║     ██║     
# ██╔═══╝ ██║   ██║██╔══██╗██║     ██║╚════██║██╔══██║    ██╔══██║██║     ██║     
# ██║     ╚██████╔╝██████╔╝███████╗██║███████║██║  ██║    ██║  ██║███████╗███████╗
# ╚═╝      ╚═════╝ ╚═════╝ ╚══════╝╚═╝╚══════╝╚═╝  ╚═╝    ╚═╝  ╚═╝╚══════╝╚══════╝
##################################################################################################################
	public function publishAll(Request $request)
	{
		// Pass along the ROUTE value of the previous page
		//$ref = app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName();

		$this->validate($request, [
			'checked' => 'required',
		]);

		$checked = $request->input('checked');

		foreach ($checked as $item) {
			$article = Article::withTrashed()->find($item);
				$article->published_at = Carbon::now();
				$article->deleted_at = Null;
			$article->save();
		}

		Session::flash('success','The selected articles were published successfully.');
		//return redirect()->route($ref);
		return redirect()->back();
	}


##################################################################################################################
# ██████╗ ███████╗███╗   ███╗ ██████╗ ██╗   ██╗███████╗    ███████╗ █████╗ ██╗   ██╗ ██████╗ ██████╗ ██╗████████╗███████╗
# ██╔══██╗██╔════╝████╗ ████║██╔═══██╗██║   ██║██╔════╝    ██╔════╝██╔══██╗██║   ██║██╔═══██╗██╔══██╗██║╚══██╔══╝██╔════╝
# ██████╔╝█████╗  ██╔████╔██║██║   ██║██║   ██║█████╗      █████╗  ███████║██║   ██║██║   ██║██████╔╝██║   ██║   █████╗  
# ██╔══██╗██╔══╝  ██║╚██╔╝██║██║   ██║╚██╗ ██╔╝██╔══╝      ██╔══╝  ██╔══██║╚██╗ ██╔╝██║   ██║██╔══██╗██║   ██║   ██╔══╝  
# ██║  ██║███████╗██║ ╚═╝ ██║╚██████╔╝ ╚████╔╝ ███████╗    ██║     ██║  ██║ ╚████╔╝ ╚██████╔╝██║  ██║██║   ██║   ███████╗
# ╚═╝  ╚═╝╚══════╝╚═╝     ╚═╝ ╚═════╝   ╚═══╝  ╚══════╝    ╚═╝     ╚═╝  ╚═╝  ╚═══╝   ╚═════╝ ╚═╝  ╚═╝╚═╝   ╚═╝   ╚══════╝
##################################################################################################################
	public function removefavorite($id)
	{
		// Pass along the ROUTE value of the previous page
		//$ref = app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName();

		$user = Auth::user()->id;
		$article = Article::find($id);

		$article->favorites()->detach($user);

		Session::flash ('success','The article was successfully removed to your Favorites list!');
		// return redirect()->route('recipes.index','all');
		// return redirect()->route('.articles.myFavorites');
		//return redirect()->route($ref, $article->id);
		return redirect()->back();

	}


##################################################################################################################
# ██████╗ ███████╗███╗   ███╗ ██████╗ ██╗   ██╗███████╗    ██████╗ ██████╗ ██╗██╗   ██╗ █████╗ ████████╗███████╗
# ██╔══██╗██╔════╝████╗ ████║██╔═══██╗██║   ██║██╔════╝    ██╔══██╗██╔══██╗██║██║   ██║██╔══██╗╚══██╔══╝██╔════╝
# ██████╔╝█████╗  ██╔████╔██║██║   ██║██║   ██║█████╗      ██████╔╝██████╔╝██║██║   ██║███████║   ██║   █████╗  
# ██╔══██╗██╔══╝  ██║╚██╔╝██║██║   ██║╚██╗ ██╔╝██╔══╝      ██╔═══╝ ██╔══██╗██║╚██╗ ██╔╝██╔══██║   ██║   ██╔══╝  
# ██║  ██║███████╗██║ ╚═╝ ██║╚██████╔╝ ╚████╔╝ ███████╗    ██║     ██║  ██║██║ ╚████╔╝ ██║  ██║   ██║   ███████╗
# ╚═╝  ╚═╝╚══════╝╚═╝     ╚═╝ ╚═════╝   ╚═══╝  ╚══════╝    ╚═╝     ╚═╝  ╚═╝╚═╝  ╚═══╝  ╚═╝  ╚═╝   ╚═╝   ╚══════╝
##################################################################################################################
	public function removeprivate($id)
	{
		// Pass along the ROUTE value of the previous page
		//$ref = app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName();

		$article = Article::find($id);
			$article->personal = 0;
		$article->save();

		// Save entry to log file using built-in Monolog
		//Log::info(Auth::user()->username . " (" . Auth::user()->id . ") REMOVE PRIVATE from recipe (" . $recipe->id . ")\r\n", 
		//    [json_decode($recipe, true)]
		//);

		Session::flash('success','The article was removed from private successfully');
		//return redirect()->route($ref);
		return redirect()->back();
	}


##################################################################################################################
# ██████╗ ███████╗███████╗███████╗████████╗    ██╗   ██╗██╗███████╗██╗    ██╗███████╗
# ██╔══██╗██╔════╝██╔════╝██╔════╝╚══██╔══╝    ██║   ██║██║██╔════╝██║    ██║██╔════╝
# ██████╔╝█████╗  ███████╗█████╗     ██║       ██║   ██║██║█████╗  ██║ █╗ ██║███████╗
# ██╔══██╗██╔══╝  ╚════██║██╔══╝     ██║       ╚██╗ ██╔╝██║██╔══╝  ██║███╗██║╚════██║
# ██║  ██║███████╗███████║███████╗   ██║        ╚████╔╝ ██║███████╗╚███╔███╔╝███████║
# ╚═╝  ╚═╝╚══════╝╚══════╝╚══════╝   ╚═╝         ╚═══╝  ╚═╝╚══════╝ ╚══╝╚══╝ ╚══════╝
// RESET VIEWS COUNT
##################################################################################################################
	public function resetViews($id)
	{
		// Pass along the ROUTE value of the previous page
		//$ref = app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName();

		$article = Article::find($id);
			$article->views = 0;
		$article->save();

		// Save entry to log file using built-in Monolog
		//Log::info(Auth::user()->username . " (" . Auth::user()->id . ") MADE recipe (" . $recipe->id . ") PRIVATE \r\n", [json_decode($recipe, true)]);

		Session::flash('success','The article\'s views count was reset to 0.');
		// return redirect()->route($ref);
		return redirect()->back();
	}


##################################################################################################################
# ██████╗ ███████╗███████╗████████╗ ██████╗ ██████╗ ███████╗
# ██╔══██╗██╔════╝██╔════╝╚══██╔══╝██╔═══██╗██╔══██╗██╔════╝
# ██████╔╝█████╗  ███████╗   ██║   ██║   ██║██████╔╝█████╗  
# ██╔══██╗██╔══╝  ╚════██║   ██║   ██║   ██║██╔══██╗██╔══╝  
# ██║  ██║███████╗███████║   ██║   ╚██████╔╝██║  ██║███████╗
# ╚═╝  ╚═╝╚══════╝╚══════╝   ╚═╝    ╚═════╝ ╚═╝  ╚═╝╚══════╝
// RESTORE TRASHED FILE
##################################################################################################################
	public function restore($id)
	{
		$article = Article::withTrashed()->findOrFail($id);

		//$article->deleted_at = NULL;
		//$article->save();
		$article->restore();

		Session::flash ('success','The article was successfully restored.');
		//return redirect()->route('backend.articles.trashed');
		// return redirect()->route('articles.trashed');
		// return redirect()->back();
		return redirect()->route('articles.trashed');
	}


##################################################################################################################
# ██████╗ ███████╗███████╗████████╗ ██████╗ ██████╗ ███████╗     █████╗ ██╗     ██╗     
# ██╔══██╗██╔════╝██╔════╝╚══██╔══╝██╔═══██╗██╔══██╗██╔════╝    ██╔══██╗██║     ██║     
# ██████╔╝█████╗  ███████╗   ██║   ██║   ██║██████╔╝█████╗      ███████║██║     ██║     
# ██╔══██╗██╔══╝  ╚════██║   ██║   ██║   ██║██╔══██╗██╔══╝      ██╔══██║██║     ██║     
# ██║  ██║███████╗███████║   ██║   ╚██████╔╝██║  ██║███████╗    ██║  ██║███████╗███████╗
# ╚═╝  ╚═╝╚══════╝╚══════╝   ╚═╝    ╚═════╝ ╚═╝  ╚═╝╚══════╝    ╚═╝  ╚═╝╚══════╝╚══════╝
// RESTORE ALL TRASHED FILE
##################################################################################################################
	public function restoreAll(Request $request)
	{
		//dd('TEST_RESTORE');
		//dd($request);
		//$this->validate($request, [
		//    'checked' => 'required',
		//]);
		//dd('TEST_RESTORE');

		$checked = $request->input('checked');
		//dd($checked);

		// $article = new Article();
		// $article->restore($checked);
		Article::whereIn('id', $checked)->restore();

		Session::flash('success','The selected articles were restored successfully.');
		return redirect()->route('articles.trashed');
	}


##################################################################################################################
# ███████╗██╗  ██╗ ██████╗ ██╗    ██╗
# ██╔════╝██║  ██║██╔═══██╗██║    ██║
# ███████╗███████║██║   ██║██║ █╗ ██║
# ╚════██║██╔══██║██║   ██║██║███╗██║
# ███████║██║  ██║╚██████╔╝╚███╔███╔╝
# ╚══════╝╚═╝  ╚═╝ ╚═════╝  ╚══╝╚══╝ 
// Display the specified resource
##################################################################################################################
	public function show($id)
	{
		// if(!checkACL('guest')) {
		//     return view('errors.403');
		// }

		// Set the variable so we can use a button in other pages to come back to this page
		//Session::put('backURL', Route::currentRouteName());
		// Save the URL in a varibale so it can be used in the blog.single page to redirect the user to the archives list page
		// Session::put('backUrl', \Request::fullUrl());

		$article = Article::findOrFail($id);

		// get previous article id
		$previous = Article::published()->where('id', '<', $article->id)->max('id');

		// get next article id
		$next = Article::published()->where('id', '>', $article->id)->min('id');

		// Add 1 to views column
		DB::table('articles')->where('id','=',$article->id)->increment('views',1);

		// Get list of articles by year and month
		$articlelinks = DB::table('articles')
			->select(DB::raw('YEAR(created_at) year, MONTH(created_at) month, MONTHNAME(created_at) month_name, COUNT(*) article_count'))
			->where('published_at', '<=', Carbon::now())
			//->where('created_at', '<=', Carbon::now()->subMonth(3))
			->groupBy('year')
			->groupBy('month')
			->orderBy('year', 'desc')
			->orderBy('month', 'desc')
			->get();

		// Save entry to log file using built-in Monolog
		// if (Auth::check()) {
		//     Log::info(Auth::user()->username . " (" . Auth::user()->id . ") VIEWED article (" . $article->id . ")");
		// } else {
		//     Log::info('Guest viewed article (' . $article->id) . ')';
		// }

		return view('articles.show', compact('article','articlelinks','next','previous'));
	}


##################################################################################################################
# ███████╗██╗  ██╗ ██████╗ ██╗    ██╗ TRASHED
# ██╔════╝██║  ██║██╔═══██╗██║    ██║
# ███████╗███████║██║   ██║██║ █╗ ██║
# ╚════██║██╔══██║██║   ██║██║███╗██║
# ███████║██║  ██║╚██████╔╝╚███╔███╔╝
# ╚══════╝╚═╝  ╚═╝ ╚═════╝  ╚══╝╚══╝ 
// Display the specified resource
##################################################################################################################
	public function showTrashed($id)
	{
		// if(!checkACL('guest')) {
		//     return view('errors.403');
		// }

		$article = Article::withTrashed()->findOrFail($id);

		// get previous article id
		//$previous = Article::published()->where('id', '<', $article->id)->max('id');

		// get next article id
		//$next = Article::published()->where('id', '>', $article->id)->min('id');

		// Add 1 to views column
		//DB::table('articles')->where('id','=',$article->id)->increment('views',1);

		// Get list of articles by year and month
		// $articlelinks = DB::table('articles')
		// 	->select(DB::raw('YEAR(created_at) year, MONTH(created_at) month, MONTHNAME(created_at) month_name, COUNT(*) article_count'))
		// 	->where('published_at', '<=', Carbon::now())
			//->where('created_at', '<=', Carbon::now()->subMonth(3))
			// ->groupBy('year')
			// ->groupBy('month')
			// ->orderBy('year', 'desc')
			// ->orderBy('month', 'desc')
			// ->get();

		// Save entry to log file using built-in Monolog
		// if (Auth::check()) {
		//     Log::info(Auth::user()->username . " (" . Auth::user()->id . ") VIEWED article (" . $article->id . ")");
		// } else {
		//     Log::info('Guest viewed article (' . $article->id) . ')';
		// }

		return view('articles.showTrashed', compact('article'));
	}


##################################################################################################################
# ███████╗████████╗ ██████╗ ██████╗ ███████╗
# ██╔════╝╚══██╔══╝██╔═══██╗██╔══██╗██╔════╝
# ███████╗   ██║   ██║   ██║██████╔╝█████╗  
# ╚════██║   ██║   ██║   ██║██╔══██╗██╔══╝  
# ███████║   ██║   ╚██████╔╝██║  ██║███████╗
# ╚══════╝   ╚═╝    ╚═════╝ ╚═╝  ╚═╝╚══════╝
// Store a newly created resource in storage
##################################################################################################################
	public function store(CreateArticleRequest $request)
	{
		// if(!checkACL('author')) {
		//     return view('errors.403');
		// }

		$article = new Article;
			$article->title             = $request->title;
			$article->category_id       = $request->category_id;
			$article->published_at      = $request->published_at;
			$article->description_eng   = $request->description_eng;
			$article->description_fre   = $request->description_fre;
			$article->user_id           = Auth::user()->id;
		$article->save();

		// Save entry to log file using built-in Monolog
		//Log::info(Auth::user()->username . " (" . Auth::user()->id . ") CREATED article (" . $article->id . ")\r\n", [json_decode($article, true)]
		//);

		Session::flash('success','The article has been created successfully!');
		// return redirect()->route($request->ref);
		return redirect()->route('articles.index');
	}


##################################################################################################################
# ███████╗████████╗ ██████╗ ██████╗ ███████╗     ██████╗ ██████╗ ███╗   ███╗███╗   ███╗███████╗███╗   ██╗████████╗
# ██╔════╝╚══██╔══╝██╔═══██╗██╔══██╗██╔════╝    ██╔════╝██╔═══██╗████╗ ████║████╗ ████║██╔════╝████╗  ██║╚══██╔══╝
# ███████╗   ██║   ██║   ██║██████╔╝█████╗      ██║     ██║   ██║██╔████╔██║██╔████╔██║█████╗  ██╔██╗ ██║   ██║   
# ╚════██║   ██║   ██║   ██║██╔══██╗██╔══╝      ██║     ██║   ██║██║╚██╔╝██║██║╚██╔╝██║██╔══╝  ██║╚██╗██║   ██║   
# ███████║   ██║   ╚██████╔╝██║  ██║███████╗    ╚██████╗╚██████╔╝██║ ╚═╝ ██║██║ ╚═╝ ██║███████╗██║ ╚████║   ██║   
# ╚══════╝   ╚═╝    ╚═════╝ ╚═╝  ╚═╝╚══════╝     ╚═════╝ ╚═════╝ ╚═╝     ╚═╝╚═╝     ╚═╝╚══════╝╚═╝  ╚═══╝   ╚═╝   
##################################################################################################################
	public function storeComment(CreateCommentRequest $request, $id)
	{

		$article = Article::find($id);

		$comment = new Comment();
			$comment->user_id = Auth::user()->id;
			$comment->comment = $request->comment;
		$article->comments()->save($comment);

		// Save entry to log file using built-in Monolog
		// if (Auth::check()) {
		//     Log::info(Auth::user()->username . " (" . Auth::user()->id . ") commented on post (" . $post->id . ")\r\n", [json_decode($comment, true)]);
		// } else {
		//     Log::info(Request::ip() . " commented on post " . $post->id);
		// }

		Session::flash('success', 'Comment added succesfully.');
		return redirect()->route('articles.show', $article->id);
	}


##################################################################################################################
# ████████╗██████╗  █████╗ ███████╗██╗  ██╗███████╗██████╗ 
# ╚══██╔══╝██╔══██╗██╔══██╗██╔════╝██║  ██║██╔════╝██╔══██╗
#    ██║   ██████╔╝███████║███████╗███████║█████╗  ██║  ██║
#    ██║   ██╔══██╗██╔══██║╚════██║██╔══██║██╔══╝  ██║  ██║
#    ██║   ██║  ██║██║  ██║███████║██║  ██║███████╗██████╔╝
#    ╚═╝   ╚═╝  ╚═╝╚═╝  ╚═╝╚══════╝╚═╝  ╚═╝╚══════╝╚═════╝ 
// Display a list of resources that have been trashed (Soft Deleted)
##################################################################################################################
	public function trashed(Request $request)
	{
		// if(!checkACL('manager')) {
		// 	return view('errors.403');
		// }

		// Set the variable so we can use a button in other pages to come back to this page
		Session::put('backURL', Route::currentRouteName());

		$articles = Article::with('user','category')->onlyTrashed()->get();
		//dd($articles);
		return view('articles.trashed', compact('articles'));
	}


##################################################################################################################
# ████████╗██████╗  █████╗ ███████╗██╗  ██╗     █████╗ ██╗     ██╗     
# ╚══██╔══╝██╔══██╗██╔══██╗██╔════╝██║  ██║    ██╔══██╗██║     ██║     
#    ██║   ██████╔╝███████║███████╗███████║    ███████║██║     ██║     
#    ██║   ██╔══██╗██╔══██║╚════██║██╔══██║    ██╔══██║██║     ██║     
#    ██║   ██║  ██║██║  ██║███████║██║  ██║    ██║  ██║███████╗███████╗
#    ╚═╝   ╚═╝  ╚═╝╚═╝  ╚═╝╚══════╝╚═╝  ╚═╝    ╚═╝  ╚═╝╚══════╝╚══════╝
// Remove the specified resource from storage
// Used in the index page to soft delete multiple records
##################################################################################################################
	public function trashAll(Request $request)
	{
		// Pass along the ROUTE value of the previous page
		//$ref = app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName();

		$this->validate($request, [
			'checked' => 'required',
		]);

		$checked = $request->input('checked');
		//dd($checked);

		foreach($checked as $article) {
			$article = Article::findOrFail($article);
			$article->published_at = Null;
			$article->save();
			//dd($article);
		}

		Article::destroy($checked);

		Session::flash('success','The selected articles were trashed successfully.');
		//return redirect()->route($ref);
		return redirect()->back();
	}


##################################################################################################################
# ██╗   ██╗███╗   ██╗██████╗ ██╗   ██╗██████╗ ██╗     ██╗███████╗██╗  ██╗
# ██║   ██║████╗  ██║██╔══██╗██║   ██║██╔══██╗██║     ██║██╔════╝██║  ██║
# ██║   ██║██╔██╗ ██║██████╔╝██║   ██║██████╔╝██║     ██║███████╗███████║
# ██║   ██║██║╚██╗██║██╔═══╝ ██║   ██║██╔══██╗██║     ██║╚════██║██╔══██║
# ╚██████╔╝██║ ╚████║██║     ╚██████╔╝██████╔╝███████╗██║███████║██║  ██║
#  ╚═════╝ ╚═╝  ╚═══╝╚═╝      ╚═════╝ ╚═════╝ ╚══════╝╚═╝╚══════╝╚═╝  ╚═╝
##################################################################################################################
	public function unpublish($id)
	{
	// Pass along the ROUTE value of the previous page
	//$ref = app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName();

	$article = Article::find($id);
		$article->published_at = NULL;
		// $article->favoriteArticles()->delete(); // Remove associated rows from article_user (favorites table)
	  
		$favorites = DB::select('select * from article_user where article_id = '. $id, [1]);
		//dd ($favorites);
		foreach($favorites as $favorite) {
			//dd($favorite);
			$article->favorites()->detach($favorite);
		}

		$article->save();

		Session::flash ('success','The article was successfully unpublished');
		// return redirect()->route($ref);
		return redirect()->back();
	}


##################################################################################################################
# ██╗   ██╗███╗   ██╗██████╗ ██╗   ██╗██████╗ ██╗     ██╗███████╗██╗  ██╗███████╗██████╗ 
# ██║   ██║████╗  ██║██╔══██╗██║   ██║██╔══██╗██║     ██║██╔════╝██║  ██║██╔════╝██╔══██╗
# ██║   ██║██╔██╗ ██║██████╔╝██║   ██║██████╔╝██║     ██║███████╗███████║█████╗  ██║  ██║
# ██║   ██║██║╚██╗██║██╔═══╝ ██║   ██║██╔══██╗██║     ██║╚════██║██╔══██║██╔══╝  ██║  ██║
# ╚██████╔╝██║ ╚████║██║     ╚██████╔╝██████╔╝███████╗██║███████║██║  ██║███████╗██████╔╝
#  ╚═════╝ ╚═╝  ╚═══╝╚═╝      ╚═════╝ ╚═════╝ ╚══════╝╚═╝╚══════╝╚═╝  ╚═╝╚══════╝╚═════╝ 
// Display a list of resources that have not been published
##################################################################################################################
	public function unpublished(Request $request, $key=null)
	{
		if(!checkACL('publisher')) {
			return view('errors.403');
		}

		// Set the variable so we can use a button in other pages to come back to this page
		Session::put('backURL', Route::currentRouteName());

		//$alphas = range('A', 'Z');
		  $alphas = DB::table('articles')
			->select(DB::raw('DISTINCT LEFT(title, 1) as letter'))
			// ->where('personal', '!=', 1)
			->where('published_at','=', null)
			->where('deleted_at','=', null)
			->orderBy('letter')
			->get();
			//dd($alphas);

		$letters = [];
		foreach($alphas as $alpha) {
			$letters[] = $alpha->letter;
		}

		// If $key value is passed
		if ($key) {
			$articles = Article::with('user','category')->unpublished()
				->where('title', 'like', $key . '%')
				->orderBy('title', 'asc')
				->get();
			return view('articles.unpublished', compact('articles','letters'));
		}

		// No $key value is passed
		$articles = Article::with('user','category')->unpublished()->get();
		return view('articles.unpublished', compact('articles','letters', 'backURL'));
	}


##################################################################################################################
# ██╗   ██╗███╗   ██╗██████╗ ██╗   ██╗██████╗ ██╗     ██╗███████╗██╗  ██╗     █████╗ ██╗     ██╗     
# ██║   ██║████╗  ██║██╔══██╗██║   ██║██╔══██╗██║     ██║██╔════╝██║  ██║    ██╔══██╗██║     ██║     
# ██║   ██║██╔██╗ ██║██████╔╝██║   ██║██████╔╝██║     ██║███████╗███████║    ███████║██║     ██║     
# ██║   ██║██║╚██╗██║██╔═══╝ ██║   ██║██╔══██╗██║     ██║╚════██║██╔══██║    ██╔══██║██║     ██║     
# ╚██████╔╝██║ ╚████║██║     ╚██████╔╝██████╔╝███████╗██║███████║██║  ██║    ██║  ██║███████╗███████╗
#  ╚═════╝ ╚═╝  ╚═══╝╚═╝      ╚═════╝ ╚═════╝ ╚══════╝╚═╝╚══════╝╚═╝  ╚═╝    ╚═╝  ╚═╝╚══════╝╚══════╝
##################################################################################################################
	public function unpublishAll(Request $request)
	{
		// Pass along the ROUTE value of the previous page
		//$ref = app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName();

		$this->validate($request, [
			'checked' => 'required',
		]);

		$checked = $request->input('checked');

		foreach ($checked as $item) {
			//dd($item);
			$article = Article::withTrashed()->find($item);
				$article->published_at = Null;

				// Delete related favorites
				$favorites = DB::select('select * from article_user where article_id = '. $article->id, [1]);
					foreach($favorites as $favorite) {
						$article->favorites()->detach($favorite);
					}
			$article->save();
		}
		

		Session::flash('success','The selected articles were unpublished successfully.');
		//return redirect()->route($ref);
		return redirect()->back();
	}


##################################################################################################################
# ██╗   ██╗██████╗ ██████╗  █████╗ ████████╗███████╗
# ██║   ██║██╔══██╗██╔══██╗██╔══██╗╚══██╔══╝██╔════╝
# ██║   ██║██████╔╝██║  ██║███████║   ██║   █████╗  
# ██║   ██║██╔═══╝ ██║  ██║██╔══██║   ██║   ██╔══╝  
# ╚██████╔╝██║     ██████╔╝██║  ██║   ██║   ███████╗
#  ╚═════╝ ╚═╝     ╚═════╝ ╚═╝  ╚═╝   ╚═╝   ╚══════╝
// UPDATE :: Update the specified resource in storage
##################################################################################################################
	public function update(UpdateArticleRequest $request, $id)
	{
		
		$article = Article::findOrFail($id);
			$article->title             = $request->title;
			$article->category_id       = $request->category_id;
			$article->published_at      = $request->published_at;
			$article->description_eng   = $request->description_eng;
			$article->description_fre   = $request->description_fre;
		$article->save();
		
		// Save entry to log file using built-in Monolog
		//Log::info(Auth::user()->username . " (" . Auth::user()->id . ") UPDATED article (" . $article->id . ")\r\n",
		//    [json_decode($article, true)]
		//);

		Session::flash('success','The article has been updated successfully.');
		return redirect()->route('articles.show', $article);
	}


}
