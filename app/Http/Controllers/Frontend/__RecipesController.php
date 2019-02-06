<?php

namespace App\Http\Controllers\Frontend;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use App\Comment;
use App\Recipe;
use Carbon\Carbon;
use Auth;
use DB;
use Session;

use App\Http\Requests\CreateCommentRequest;

class RecipesController extends Controller
{

##################################################################################################################
#  ██████╗ ██████╗ ███╗   ██╗███████╗████████╗██████╗ ██╗   ██╗ ██████╗████████╗
# ██╔════╝██╔═══██╗████╗  ██║██╔════╝╚══██╔══╝██╔══██╗██║   ██║██╔════╝╚══██╔══╝
# ██║     ██║   ██║██╔██╗ ██║███████╗   ██║   ██████╔╝██║   ██║██║        ██║   
# ██║     ██║   ██║██║╚██╗██║╚════██║   ██║   ██╔══██╗██║   ██║██║        ██║   
# ╚██████╗╚██████╔╝██║ ╚████║███████║   ██║   ██║  ██║╚██████╔╝╚██████╗   ██║   
#  ╚═════╝ ╚═════╝ ╚═╝  ╚═══╝╚══════╝   ╚═╝   ╚═╝  ╚═╝ ╚═════╝  ╚═════╝   ╚═╝   
##################################################################################################################


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

		$archives = Recipe::with('user')->whereYear('published_at','=', $year)
			->whereMonth('published_at','=', $month)
			->where('published_at', '<=', Carbon::now())
			->get();

		// Get list of recips by year and month
		$recipelinks = DB::table('recipes')
			->select(DB::raw('YEAR(published_at) year, MONTH(published_at) month, MONTHNAME(published_at) month_name, COUNT(*) recipe_count'))
			->where('published_at', '<=', Carbon::now())
			->groupBy('year')->groupBy('month')->orderBy('year', 'desc')->orderBy('month', 'desc')->get();

		// Save the URL in a varibale so it can be used in the blog.single page to redirect the user to the archives list page
		Session::flash('backUrl', Request::fullUrl());
		return view('frontend.recipes.archive')->withArchives($archives)->withYear($year)->withMonth($month)->withRecipelinks($recipelinks);
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
		$user = Auth::user()->id;
		$recipe = Recipe::find($id);

		$recipe->favorites()->sync([$user], false);

		Session::flash ('success','The recipe was successfully added to your Favorites list!');
		//return redirect()->route('recipes.myFavorites','all');
		return redirect()->route('recipes.show', $id);
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
  		//         //return view('errors.403');
		// 	abort(403, 'Unauthorized action');
  		//     }

		// Save entry to log file using built-in Monolog
		// if (Auth::check()) {
		// 	Log::info(Auth::user()->username . " (" . Auth::user()->id . ") accessed :: Recipes / Index");
		// } else {
		// 	Log::info( getClientIP() . " accessed :: Recipes / index");
		// }

		// Get list of recips by year and month
		$recipelinks = DB::table('recipes')
			->select(DB::raw('YEAR(published_at) year, MONTH(published_at) month, MONTHNAME(published_at) month_name, COUNT(*) recipe_count'))
			->where('published_at', '<=', Carbon::now())
			->groupBy('year')->groupBy('month')->orderBy('year', 'desc')->orderBy('month', 'desc')->get();

		//$alphas = range('A', 'Z');
		$alphas = DB::table('recipes')
			->select(DB::raw('DISTINCT LEFT(title, 1) as letter'))
			->where('published_at', '<', Carbon::now())
			->orderBy('letter')
			->get();
			//dd($alphas);

		$letters = [];
		foreach($alphas as $alpha) {
			$letters[] = $alpha->letter;
		}
		//dd($letters);

		// if ($key == 'all') {
		// 	// Display all the user's recipes plus the one from other users that are not marked as personal/private
		// 	$recipes = Recipe::with('user','category')->published()
		// 	// ->where('personal','!=',1)
		// 	// ->where('published','>=', $pub)
		// 	->orderBy('title', 'asc')
		// 	->get();
		
		// 	return view('frontend.recipes.index', compact('recipes','letters'));
		// }

		// if ($key != 'all') {
		// 	$recipes = Recipe::with('user','category')->published()
		// 		// ->where('personal', '!=', 1)
		// 		// ->where('published','>=', $pub)
		// 		->where('title', 'like', $key . '%')
		// 		->orderBy('title', 'asc')
		// 		->get();
		
		// 	return view('frontend.recipes.index', compact('recipes','letters'));
		// }

		// If $key value is passed
		if ($key) {
			$recipes = Recipe::with('user','category')->published()
				->where('title', 'like', $key . '%')
				->orderBy('title', 'asc')
				->get();
			return view('frontend.recipes.index', compact('recipes','letters','recipelinks'));
		}

		// No $key value is passed
		$recipes = Recipe::with('user','category')->published()->get();
		return view('frontend.recipes.index', compact('recipes','letters','recipelinks'));

		// } else {
		//   if ($key == 'all') {
		//     // Display all the user's recipes that are not marked as personal/private
		//     $recipes = Recipe::where('personal','!=',1)->orderBy('title', 'asc')->get();
		//     return view('recipes.index')->withRecipes($recipes);
		//   }

		//   if ($key != 'all') {
		//     $recipes = Recipe::where('personal', '!=', 1)->where('title', 'like', $key . '%')->get();
		//     return view('recipes.index')->withRecipes($recipes);
		//   }
		// }
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
		// find the favorites
		$favs = DB::table('recipe_user')
			->where('user_id','=',Auth::user()->id)
			->get();
		//dd($favs);

		// Create an empty array to store the recipes        
		$recipes = [];

		// Store the recipe values into the $recipes array
		foreach ($favs as $fav)
		{
			$recipes[$fav->id] = Recipe::find($fav->recipe_id);
		}
		//dd($recipeIds);

		// $alphas = DB::table('recipes')
		// 	->select(DB::raw('DISTINCT LEFT(title, 1) as letter'))
		// 	->whereIn('id', $recipeIds->recipe->id)
		// 	->orderBy('letter')
		// 	->get();
		// dd($alphas);

		$letters = [];
		// foreach($alphas as $alpha) {
		// 	$letters[] = $alpha->letter;
		// }
		//dd($letters);

		// Sort the recipes array by title
		// $recipes = array_values(array_sort($recipes, function ($value) {
		// 	return $value['title'];
		// }));

		return view('frontend.recipes.myFavorites', compact('recipes','letters'));
	}


##################################################################################################################
# ███╗   ███╗██╗   ██╗    ██████╗ ███████╗ ██████╗██╗██████╗ ███████╗███████╗
# ████╗ ████║╚██╗ ██╔╝    ██╔══██╗██╔════╝██╔════╝██║██╔══██╗██╔════╝██╔════╝
# ██╔████╔██║ ╚████╔╝     ██████╔╝█████╗  ██║     ██║██████╔╝█████╗  ███████╗
# ██║╚██╔╝██║  ╚██╔╝      ██╔══██╗██╔══╝  ██║     ██║██╔═══╝ ██╔══╝  ╚════██║
# ██║ ╚═╝ ██║   ██║       ██║  ██║███████╗╚██████╗██║██║     ███████╗███████║
# ╚═╝     ╚═╝   ╚═╝       ╚═╝  ╚═╝╚══════╝ ╚═════╝╚═╝╚═╝     ╚══════╝╚══════╝
// Display a listing of the resource that belong to a specific user.
##################################################################################################################
	public function myRecipes($key=null)
	{
		if (Auth::check()) {
			$alphas = DB::table('recipes')
				->select(DB::raw('DISTINCT LEFT(title, 1) as letter'))
				->where('user_id','=', Auth::user()->id)
				->where('published_at', '<', Carbon::now())
				->orderBy('letter')
				->get();
			//dd($alphas);

			$letters = [];
			foreach($alphas as $alpha) {
				$letters[] = $alpha->letter;
			}

			// if ($key == 'all') {
			// 	// Display all the user's recipes plus the one from other users that are not marked as personal/private
			// 	$recipes = Recipe::with('user','category')
			// 		->where('user_id','=', Auth::user()->id)
			// 		->orderBy('title', 'asc')
			// 		->get();
			
			// 	return view('frontend.recipes.myRecipes', compact('recipes','letters'));
			// }
			
			// if ($key != 'all') {
			// 	$recipes = Recipe::with('user','category')
			// 		->where('user_id','=', Auth::user()->id)
			// 		->where('title', 'like', $key . '%')
			// 		->orderBy('title', 'asc')
			// 		->get();
			
			// 	return view('frontend.recipes.myRecipes', compact('recipes','letters'));
			// }
					// If $key value is passed
			if ($key) {
				$recipes = Recipe::with('user','category')->published()->myRecipes()
					->where('title', 'like', $key . '%')
					->orderBy('title', 'asc')
					->get();
				return view('frontend.recipes.myRecipes', compact('recipes','letters'));
			}

			// No $key value is passed
			$recipes = Recipe::with('user','category')->published()->myRecipes()->get();
			return view('frontend.recipes.myRecipes', compact('recipes','letters'));
		}
	}


##################################################################################################################
# ██████╗ ██████╗ ██╗███╗   ██╗████████╗
# ██╔══██╗██╔══██╗██║████╗  ██║╚══██╔══╝
# ██████╔╝██████╔╝██║██╔██╗ ██║   ██║   
# ██╔═══╝ ██╔══██╗██║██║╚██╗██║   ██║   
# ██║     ██║  ██║██║██║ ╚████║   ██║   
# ╚═╝     ╚═╝  ╚═╝╚═╝╚═╝  ╚═══╝   ╚═╝   
##################################################################################################################
	public function printRecipe($id)
	{
		$recipe = Recipe::find($id);

		// Save entry to log file using built-in Monolog
		// Log::info(Auth::user()->username . " (" . Auth::user()->id . ") PRINTED recipe (" . $recipe->id . ")\r\n", [json_decode($recipe, true)]);

		return view('frontend.recipes.print')->withRecipe($recipe);
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
		$user = Auth::user()->id;
		$recipe = Recipe::find($id);

		$recipe->favorites()->detach($user);

		Session::flash ('success','The recipe was successfully removed to your Favorites list!');
		// return redirect()->route('recipes.index','all');
		//return redirect()->route('recipes.myFavorites','all');
		return redirect()->route('recipes.show', $id);
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
		  // public function storeComment(Request $request, $id)
	 {
		  //dd($id);
		  $recipe = Recipe::find($id);
		  //dd($project);

		  $comment = new Comment();
				// $comment->name = $request->name;
				// $comment->email = $request->email;
				$comment->user_id = Auth::user()->id;
				$comment->comment = $request->comment;
			$recipe->comments()->save($comment);
		  //$comment->save();

		  // Save entry to log file using built-in Monolog
		  // if (Auth::check()) {
		  //     Log::info(Auth::user()->username . " (" . Auth::user()->id . ") commented on post (" . $post->id . ")\r\n", [json_decode($comment, true)]);
		  // } else {
		  //     Log::info(Request::ip() . " commented on post " . $post->id);
		  // }

		  Session::flash('success', 'Comment added succesfully.');
		  return redirect()->route('recipes.show', $recipe->id);
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
		$recipe = Recipe::find($id);

		// get previous recipe id
		$previous = Recipe::published()->where('id', '<', $recipe->id)->max('id');

		// get next recipe id
		$next = Recipe::published()->where('id', '>', $recipe->id)->min('id');

		// Add 1 to views column
		DB::table('recipes')->where('id','=',$recipe->id)->increment('views',1);

		// If user is logged in, update the last_viewed_by_id and last_viewed_on fields in the recipes table
		// if (Auth::check()) {
		// 	DB::statement("UPDATE recipes SET last_viewed_by_id = " . Auth::user()->id . " where id = " . $id );
		// 	DB::statement("UPDATE recipes SET last_viewed_on = " . DB::raw('NOW()') . " where id = " . $id );
		// }

		// Get list of recips by year and month
		$recipelinks = DB::table('recipes')
			->select(DB::raw('YEAR(published_at) year, MONTH(published_at) month, MONTHNAME(published_at) month_name, COUNT(*) recipe_count'))
			->where('published_at', '<=', Carbon::now())
			//->subMonth(3)) --Only show the last 3 months
			//->whereRaw('published = 1') -- field no longer used
			->groupBy('year')
			->groupBy('month')
			->orderBy('year', 'desc')
			->orderBy('month', 'desc')
			->get();

		// Save entry to log file using built-in Monolog
		if (Auth::check()) {
			//Log::info(Auth::user()->username . " (" . Auth::user()->id . ") viewed :: Recipe (" . $recipe->id . ")");
		} else {
			//Log::info(getClientIP() . " viewed :: Recipe (" . $recipe->id . ")");
		}

		return view('frontend.recipes.show', compact('recipe','recipelinks','next','previous'));
	}


}
