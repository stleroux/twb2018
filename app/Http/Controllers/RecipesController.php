<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Category;
use App\Comment;
use App\Module;
use App\Recipe;
use App\User;
use Carbon\Carbon;
use Auth;
use DB;
use Excel;
use File;
use Image;
use JavaScript;
use Log;
use PDF;
use Purifier;
use Route;
use Session;
use Storage;
use Table;
use URL;


use App\Http\Requests\CreateRecipeRequest;
use App\Http\Requests\UpdateRecipeRequest;
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

      // Set the variable so we can use a button in other pages to come back to this page
      //Session::put('backURL', Route::currentRouteName());

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
		//Session::flash('backUrl', Request::fullUrl());
      // Set the variable so we can use a button in other pages to come back to this page
      //Session::flash('archiveURL', \Request::fullUrl());
      Session::put('archiveURL', \Request::fullUrl());
      //Session::put('archiveURL', Route::currentRouteName());
		return view('recipes.archive')->withArchives($archives)->withYear($year)->withMonth($month)->withRecipelinks($recipelinks);
	}


##################################################################################################################
#  █████╗ ██████╗ ██████╗     ███████╗ █████╗ ██╗   ██╗ ██████╗ ██████╗ ██╗████████╗███████╗
# ██╔══██╗██╔══██╗██╔══██╗    ██╔════╝██╔══██╗██║   ██║██╔═══██╗██╔══██╗██║╚══██╔══╝██╔════╝
# ███████║██║  ██║██║  ██║    █████╗  ███████║██║   ██║██║   ██║██████╔╝██║   ██║   █████╗  
# ██╔══██║██║  ██║██║  ██║    ██╔══╝  ██╔══██║╚██╗ ██╔╝██║   ██║██╔══██╗██║   ██║   ██╔══╝  
# ██║  ██║██████╔╝██████╔╝    ██║     ██║  ██║ ╚████╔╝ ╚██████╔╝██║  ██║██║   ██║   ███████╗
# ╚═╝  ╚═╝╚═════╝ ╚═════╝     ╚═╝     ╚═╝  ╚═╝  ╚═══╝   ╚═════╝ ╚═╝  ╚═╝╚═╝   ╚═╝   ╚══════╝
##################################################################################################################
	public function addFavorite($id)
	{
		$user = Auth::user()->id;
		$recipe = Recipe::find($id);

		$recipe->favorites()->sync([$user], false);

		Session::flash ('success','The recipe was successfully added to your Favorites list!');
		//return redirect()->route('recipes.myFavorites','all');
		return redirect()->route('recipes.show', $id);
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
      // if(!checkACL('author')) {
      //     return view('errors.403');
      // }

      // Pass along the ROUTE value of the previous page
      $ref = app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName();

      // find all categories in the categories table and pass them to the view
      $categories = Category::whereHas('module', function ($query) {
         $query->where('name', '=', 'recipes');
      })->orderBy('name','asc')->get();

      // Create an empty array to store the categories
      $cats = [];

      // Store the category values into the $cats array
      foreach ($categories as $category) {
         $cats[$category->id] = $category->name;
      }

      return view('recipes.create')->withCategories($cats)->withRef($ref);
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
      $ref = app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName();

      //dd('TEST_DELETE');
      $this->validate($request, [
         'checked' => 'required',
      ]);
      //dd('TEST_DELETE');

      $checked = $request->input('checked');
      //dd($checked);

      // $article = Article::withTrashed()->findOrFail($checked);
      //Article::destroy($checked);
      Recipe::whereIn('id', $checked)->forceDelete();

      Session::flash('success','The recipes were deleted successfully.');
      return redirect()->route($ref);
   }


##################################################################################################################
# ██████╗ ███████╗██╗     ███████╗████████╗███████╗    ████████╗██████╗  █████╗ ███████╗██╗  ██╗███████╗██████╗ 
# ██╔══██╗██╔════╝██║     ██╔════╝╚══██╔══╝██╔════╝    ╚══██╔══╝██╔══██╗██╔══██╗██╔════╝██║  ██║██╔════╝██╔══██╗
# ██║  ██║█████╗  ██║     █████╗     ██║   █████╗         ██║   ██████╔╝███████║███████╗███████║█████╗  ██║  ██║
# ██║  ██║██╔══╝  ██║     ██╔══╝     ██║   ██╔══╝         ██║   ██╔══██╗██╔══██║╚════██║██╔══██║██╔══╝  ██║  ██║
# ██████╔╝███████╗███████╗███████╗   ██║   ███████╗       ██║   ██║  ██║██║  ██║███████║██║  ██║███████╗██████╔╝
# ╚═════╝ ╚══════╝╚══════╝╚══════╝   ╚═╝   ╚══════╝       ╚═╝   ╚═╝  ╚═╝╚═╝  ╚═╝╚══════╝╚═╝  ╚═╝╚══════╝╚═════╝ 
// Permanently remove the specified resource from storage - individual record
##################################################################################################################
   public static function deleteTrashed($id)
   {
      // if(!checkACL('manager')) {
         // return view('errors.403');
      // }
      //dd($id);
      $recipe = Recipe::withTrashed()->findOrFail($id);
      $recipe->forceDelete();

      Session::flash ('success','The recipe was deleted successfully.');
      return redirect()->route('recipes.trashed');
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
      $ref = app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName();

      $recipe = Recipe::findOrFail($id);
         $recipe->published_at = Null;
            // Delete related favorites
            $favorites = DB::select('select * from recipe_user where recipe_id = '. $id, [1]);
              foreach($favorites as $favorite) {
               $recipe->favoriteRecipes()->detach($favorite);
              }
         $recipe->save();
      $recipe->delete();

      // Save entry to log file using built-in Monolog
      //Log::info(Auth::user()->username . " (" . Auth::user()->id . ") DELETED article (" . $article->id . ")\r\n",
      //    [json_decode($article, true)]
      //);

      Session::flash('success','The recipe was trashed successfully.');
      return redirect()->route($ref);
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
      // if(!checkACL('manager')) {
      //   // Save entry to log file of failure
      //   Log::warning(Auth::user()->username . " (" . Auth::user()->id . ") tried to access :: Articles / Download");
      //   return view('errors.403');
      // }

      // $referrer = request()->headers->get('referer');
      // //dd($referrer);
      // if ($referrer == 'http://localhost:8000/recipes/myRecipes') {
      //    $data = Recipe::myRecipes()->get()->toArray();
      // // } elseif ($referrer == 'http://localhost:8000/backend/articles'){
      // //     $data = Article::get()->toArray();
      // } else {
      //    $data = Recipe::get()->toArray();
      // }
      if(!checkACL('manager')) {
         return view('errors.403');
      }

      if(app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'recipes.index') {
            $data = Recipe::published()->get()->toArray();
      }
      if(app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'recipes.newRecipes') {
            $data = Recipe::newRecipes()->get()->toArray();
      }
      if(app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'recipes.myRecipes') {
            $data = Recipe::myRecipes()->get()->toArray();
      }
      if(app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'recipes.unpublished') {
            $data = Recipe::unpublished()->get()->toArray();
      }
      if(app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'recipes.future') {
            $data = Recipe::future()->get()->toArray();
      }
      if(app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'recipes.trashed') {
            $data = Recipe::trashedCount()->get()->toArray();
      }

      // Save entry to log file of failure
      //Log::info(Auth::user()->username . " (" . Auth::user()->id . ") downloaded :: articles");

      return Excel::create('Recipes_List', function($excel) use ($data) {
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

      $recipe = Recipe::find($id);
        $newRecipe = $recipe->replicate();
        $newRecipe->user_id = Auth::user()->id;
      $newRecipe->save();

      // change the user_id field to be that of the user that is currently logged in
      
      //$newArticle->views = 0;
      //$newArticle->save();

      // Save entry to log file using built-in Monolog
      //Log::info(Auth::user()->username . " (" . Auth::user()->id . ") duplicated :: article " . $article->id . " to article ". $newArticle->id);

      Session::flash ('success','The recipe was duplicated successfully!');
      return redirect()->route($ref);
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
      // if(!checkACL('author')) {
      //     return view('errors.403');
      // }

      // Pass along the ROUTE value of the previous page
      //$ref = app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName();
      //Session::put('fullURL', \Request::fullUrl());

      // Find the article to edit
      $recipe = Recipe::findOrFail($id);

      // find all categories in the categories table and pass them to the view
      $categories = Category::whereHas('module', function ($query) {
         $query->where('name', '=', 'recipes');
      })->get();

      // Create an empty array to store the categories
      $cats = [];
      // Store the category values into the $cats array
      foreach ($categories as $category) {
         $cats[$category->id] = $category->name;
      }

      return view('recipes.edit', compact('recipe'))->withCategories($cats);
      //->withRef($ref);
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
      // if(!checkACL('guest')) {
      //     return view('errors.403');
      // }

      //$alphas = range('A', 'Z');
      $alphas = DB::table('recipes')
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
         $recipes = Recipe::with('user','category')->future()
            ->where('title', 'like', $key . '%')
            ->orderBy('title', 'asc')
            ->get();
         return view('recipes.future', compact('recipes','letters'));
      }

      // No $key value is passed
      $recipes = Recipe::with('user','category')->future()->get();
      return view('recipes.future', compact('recipes','letters'));
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
      // if(!checkACL('manager')) {
      //   // Save entry to log file of failure
      //   Log::warning(Auth::user()->username . " (" . Auth::user()->id . ") tried to access :: Articles / Import");
      //   return view('errors.403');
      // }

      // Save entry to log file of failure
      //Log::warning(Auth::user()->username . " (" . Auth::user()->id . ") accessed :: Articles / Import");

      return view('recipes.import');
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
                  'user_id'            => $value->user_id,
                  'category_id'        => $value->category_id,
                  'title'              => $value->title,            
                  'description_eng'    => $value->description_eng,
                  'description_fre'    => $value->description_fre,
                  'views'              =>  0,
                  'deleted_at'         => $value->deleted_at,
                  'published_at'       => $value->published_at,
                  'created_at'         => $value->created_at,
                  'updated_at'         => $value->updated_at,
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
  		//         //return view('errors.403');
		// 	abort(403, 'Unauthorized action');
  		//     }

		// Save entry to log file using built-in Monolog
		// if (Auth::check()) {
		// 	Log::info(Auth::user()->username . " (" . Auth::user()->id . ") accessed :: Recipes / Index");
		// } else {
		// 	Log::info( getClientIP() . " accessed :: Recipes / index");
		// }

      // Set the variable so we can use a button in other pages to come back to this page
      Session::put('backURL', Route::currentRouteName());

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
		
		// 	return view('recipes.index', compact('recipes','letters'));
		// }

		// if ($key != 'all') {
		// 	$recipes = Recipe::with('user','category')->published()
		// 		// ->where('personal', '!=', 1)
		// 		// ->where('published','>=', $pub)
		// 		->where('title', 'like', $key . '%')
		// 		->orderBy('title', 'asc')
		// 		->get();
		
		// 	return view('recipes.index', compact('recipes','letters'));
		// }

		// If $key value is passed
		if ($key) {
			$recipes = Recipe::with('user','category')
				->published()
				->where('title', 'like', $key . '%')
				->orderBy('title', 'asc')
				->get();
			return view('recipes.index', compact('recipes','letters','recipelinks'));
		}

		// No $key value is passed
		$recipes = Recipe::with('user','category')
			->published()
			->orderBy('title', 'asc')
			->get();
		return view('recipes.index', compact('recipes','letters','recipelinks'));

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
# ███╗   ███╗ █████╗ ██╗  ██╗███████╗    ██████╗ ██████╗ ██╗██╗   ██╗ █████╗ ████████╗███████╗
# ████╗ ████║██╔══██╗██║ ██╔╝██╔════╝    ██╔══██╗██╔══██╗██║██║   ██║██╔══██╗╚══██╔══╝██╔════╝
# ██╔████╔██║███████║█████╔╝ █████╗      ██████╔╝██████╔╝██║██║   ██║███████║   ██║   █████╗  
# ██║╚██╔╝██║██╔══██║██╔═██╗ ██╔══╝      ██╔═══╝ ██╔══██╗██║╚██╗ ██╔╝██╔══██║   ██║   ██╔══╝  
# ██║ ╚═╝ ██║██║  ██║██║  ██╗███████╗    ██║     ██║  ██║██║ ╚████╔╝ ██║  ██║   ██║   ███████╗
# ╚═╝     ╚═╝╚═╝  ╚═╝╚═╝  ╚═╝╚══════╝    ╚═╝     ╚═╝  ╚═╝╚═╝  ╚═══╝  ╚═╝  ╚═╝   ╚═╝   ╚══════╝
##################################################################################################################
   public function makePrivate($id)
   {
      // Pass along the ROUTE value of the previous page
      //$ref = app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName();
      // Set the variable so we can use a button in other pages to come back to this page
      //Session::put('backURL', Route::currentRouteName());
      //Session::put('fullURL', \Request::fullUrl());

      $recipe = Recipe::find($id);
         $recipe->personal = 1;
      $recipe->save();

      // Save entry to log file using built-in Monolog
      //Log::info(Auth::user()->username . " (" . Auth::user()->id . ") MADE recipe (" . $recipe->id . ") PRIVATE \r\n", [json_decode($recipe, true)]);

      Session::flash('success','The recipe was successfully made private');
      //return redirect()->route($ref);
      return redirect()->route('recipes.show', $id);
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
      // Set the variable so we can use a button in other pages to come back to this page
      Session::put('backURL', Route::currentRouteName());
      
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

		return view('recipes.myFavorites', compact('recipes','letters'));
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
      // Set the variable so we can use a button in other pages to come back to this page
      Session::put('backURL', Route::currentRouteName());

		if (Auth::check()) {
			$alphas = DB::table('recipes')
				->select(DB::raw('DISTINCT LEFT(title, 1) as letter'))
				->where('user_id','=', Auth::user()->id)
				// ->where('published_at', '<', Carbon::now())
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
			
			// 	return view('recipes.myRecipes', compact('recipes','letters'));
			// }
			
			// if ($key != 'all') {
			// 	$recipes = Recipe::with('user','category')
			// 		->where('user_id','=', Auth::user()->id)
			// 		->where('title', 'like', $key . '%')
			// 		->orderBy('title', 'asc')
			// 		->get();
			
			// 	return view('recipes.myRecipes', compact('recipes','letters'));
			// }
					// If $key value is passed
			if ($key) {
				$recipes = Recipe::with('user','category')->myRecipes()
					->where('title', 'like', $key . '%')
					->orderBy('title', 'asc')
					->get();
				return view('recipes.myRecipes', compact('recipes','letters'));
			}

			// No $key value is passed
			$recipes = Recipe::with('user','category')->myRecipes()->get();
			return view('recipes.myRecipes', compact('recipes','letters'));
		}
	}


##################################################################################################################
# ███╗   ██╗███████╗██╗    ██╗    ██████╗ ███████╗ ██████╗██╗██████╗ ███████╗███████╗
# ████╗  ██║██╔════╝██║    ██║    ██╔══██╗██╔════╝██╔════╝██║██╔══██╗██╔════╝██╔════╝
# ██╔██╗ ██║█████╗  ██║ █╗ ██║    ██████╔╝█████╗  ██║     ██║██████╔╝█████╗  ███████╗
# ██║╚██╗██║██╔══╝  ██║███╗██║    ██╔══██╗██╔══╝  ██║     ██║██╔═══╝ ██╔══╝  ╚════██║
# ██║ ╚████║███████╗╚███╔███╔╝    ██║  ██║███████╗╚██████╗██║██║     ███████╗███████║
# ╚═╝  ╚═══╝╚══════╝ ╚══╝╚══╝     ╚═╝  ╚═╝╚══════╝ ╚═════╝╚═╝╚═╝     ╚══════╝╚══════╝
// Display a listing of the resource that were created since the user's last login.
##################################################################################################################
   public function newRecipes(Request $request, $key=null)
   {
      if(!checkACL('author')) {
          return view('errors.403');
      }

      // Set the variable so we can use a button in other pages to come back to this page
      Session::put('backURL', Route::currentRouteName());

      //$alphas = range('A', 'Z');
      $alphas = DB::table('recipes')
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
         $recipes = Recipe::with('user','category')->newRecipes()
            ->where('title', 'like', $key . '%')
            ->get();
         return view('recipes.newRecipes', compact('recipes','letters'));
      }

      $recipes = Recipe::with('user','category')->newRecipes()->get();
      return view('recipes.newRecipes', compact('recipes','letters'));
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
   //   $pdf = PDF::loadView('articles.pdfView');
   //   return $pdf->download('articles.pdf');
   // }

   public function pdfview(Request $request)
   {
      //$articles = DB::table("articles")->get();

      $referrer = request()->headers->get('referer');
      if ($referrer == 'http://localhost:8000/backend/recipes/myRecipes') {
         $data = Recipe::myRecipes()->get();
      } else {
         $data = Recipe::All();
      }

      view()->share('recipes',$data);

      if($request->has('download')){
         $pdf = PDF::loadView('recipes.pdfDownload');
         //$pdf->setPaper('A4', 'landscape');
         return $pdf->download('recipes.pdf');
      }

      return view('recipes.pdfPreview');
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
		$recipe = Recipe::find($id);

		// Save entry to log file using built-in Monolog
		// Log::info(Auth::user()->username . " (" . Auth::user()->id . ") PRINTED recipe (" . $recipe->id . ")\r\n", [json_decode($recipe, true)]);

		return view('recipes.print')->withRecipe($recipe);
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
      Session::put('fullURL', \Request::fullUrl());


      $recipe = Recipe::find($id);
        $recipe->published_at = Carbon::now();
        $recipe->deleted_at = Null;
      $recipe->save();

      Session::flash ('success','The recipe was successfully published.');
      //return redirect()->route($ref);
      return redirect()->route('recipes.show', $id);
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
      $ref = app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName();

      //dd('TEST_DELETE');
      $this->validate($request, [
         'checked' => 'required',
      ]);
      //dd('TEST_DELETE');

      $checked = $request->input('checked');
      //dd($checked);

      // $article = Article::withTrashed()->findOrFail($checked);
      //Article::destroy($checked);
      //Article::whereIn('id', $checked)->publish();
      foreach ($checked as $item) {
         //dd($item);
         $recipe = Recipe::withTrashed()->find($item);
         //dd($article);
            $recipe->published_at = Carbon::now();
            $recipe->deleted_at = Null;
         $recipe->save();
      }

      Session::flash('success','The recipes were published successfully.');
      return redirect()->route($ref);
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
      if(!checkACL('user')) {
          return view('errors.403');
      }

      //$alphas = range('A', 'Z');
        $alphas = DB::table('recipes')
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
         $recipes = Recipe::with('user','category')->published()
            ->where('title', 'like', $key . '%')
            ->orderBy('title', 'asc')
            ->get();
         return view('recipes.published', compact('recipes','letters'));
      }

      // No $key value is passed
      $recipes = Recipe::with('user','category')->published()->get();
      return view('recipes.published', compact('recipes','letters'));
   }


##################################################################################################################
# ██████╗ ███████╗███╗   ███╗ ██████╗ ██╗   ██╗███████╗    ███████╗ █████╗ ██╗   ██╗ ██████╗ ██████╗ ██╗████████╗███████╗
# ██╔══██╗██╔════╝████╗ ████║██╔═══██╗██║   ██║██╔════╝    ██╔════╝██╔══██╗██║   ██║██╔═══██╗██╔══██╗██║╚══██╔══╝██╔════╝
# ██████╔╝█████╗  ██╔████╔██║██║   ██║██║   ██║█████╗      █████╗  ███████║██║   ██║██║   ██║██████╔╝██║   ██║   █████╗  
# ██╔══██╗██╔══╝  ██║╚██╔╝██║██║   ██║╚██╗ ██╔╝██╔══╝      ██╔══╝  ██╔══██║╚██╗ ██╔╝██║   ██║██╔══██╗██║   ██║   ██╔══╝  
# ██║  ██║███████╗██║ ╚═╝ ██║╚██████╔╝ ╚████╔╝ ███████╗    ██║     ██║  ██║ ╚████╔╝ ╚██████╔╝██║  ██║██║   ██║   ███████╗
# ╚═╝  ╚═╝╚══════╝╚═╝     ╚═╝ ╚═════╝   ╚═══╝  ╚══════╝    ╚═╝     ╚═╝  ╚═╝  ╚═══╝   ╚═════╝ ╚═╝  ╚═╝╚═╝   ╚═╝   ╚══════╝
##################################################################################################################
	public function removeFavorite($id)
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
# ██████╗ ███████╗███╗   ███╗ ██████╗ ██╗   ██╗███████╗    ██████╗ ██████╗ ██╗██╗   ██╗ █████╗ ████████╗███████╗
# ██╔══██╗██╔════╝████╗ ████║██╔═══██╗██║   ██║██╔════╝    ██╔══██╗██╔══██╗██║██║   ██║██╔══██╗╚══██╔══╝██╔════╝
# ██████╔╝█████╗  ██╔████╔██║██║   ██║██║   ██║█████╗      ██████╔╝██████╔╝██║██║   ██║███████║   ██║   █████╗  
# ██╔══██╗██╔══╝  ██║╚██╔╝██║██║   ██║╚██╗ ██╔╝██╔══╝      ██╔═══╝ ██╔══██╗██║╚██╗ ██╔╝██╔══██║   ██║   ██╔══╝  
# ██║  ██║███████╗██║ ╚═╝ ██║╚██████╔╝ ╚████╔╝ ███████╗    ██║     ██║  ██║██║ ╚████╔╝ ██║  ██║   ██║   ███████╗
# ╚═╝  ╚═╝╚══════╝╚═╝     ╚═╝ ╚═════╝   ╚═══╝  ╚══════╝    ╚═╝     ╚═╝  ╚═╝╚═╝  ╚═══╝  ╚═╝  ╚═╝   ╚═╝   ╚══════╝
##################################################################################################################
   public function removePrivate($id)
   {
      // Pass along the ROUTE value of the previous page
      //$ref = app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName();
      Session::put('fullURL', \Request::fullUrl());

      $recipe = Recipe::find($id);
         $recipe->personal = 0;
      $recipe->save();

      // Save entry to log file using built-in Monolog
      //Log::info(Auth::user()->username . " (" . Auth::user()->id . ") REMOVE PRIVATE from recipe (" . $recipe->id . ")\r\n", 
      //    [json_decode($recipe, true)]
      //);

      Session::flash('success','The recipe was successfully removed from private');
      //return redirect()->route($ref);
      return redirect()->route('recipes.show', $id);
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
      $ref = app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName();

      $recipe = Recipe::find($id);
         $recipe->views = 0;
      $recipe->save();

      // Save entry to log file using built-in Monolog
      //Log::info(Auth::user()->username . " (" . Auth::user()->id . ") MADE recipe (" . $recipe->id . ") PRIVATE \r\n", [json_decode($recipe, true)]);

      Session::flash('success','The recipe\'s views count was reset to 0.');
      return redirect()->route($ref);
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
      $recipe = Recipe::withTrashed()->findOrFail($id);

      //$article->deleted_at = NULL;
      //$article->save();
      $recipe->restore();

      Session::flash ('success','The recipe was successfully restored.');
      return redirect()->route('recipes.trashed');
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
      Recipe::whereIn('id', $checked)->restore();

      Session::flash('success','The recipes were restored successfully.');
      return redirect()->route('recipes.trashed');
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

      // Set the variable so we can use a button in other pages to come back to this page
      Session::put('fullURL', \Request::fullUrl());

      // get previous recipe id
      $previous = Recipe::published()->where('id', '<', $recipe->id)->max('id');

      // get next recipe id
      $next = Recipe::published()->where('id', '>', $recipe->id)->min('id');

      // Add 1 to views column
      DB::table('recipes')->where('id','=',$recipe->id)->increment('views',1);

      // If user is logged in, update the last_viewed_by_id and last_viewed_on fields in the recipes table
      // if (Auth::check()) {
      //    DB::statement("UPDATE recipes SET last_viewed_by_id = " . Auth::user()->id . " where id = " . $id );
      //    DB::statement("UPDATE recipes SET last_viewed_on = " . DB::raw('NOW()') . " where id = " . $id );
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

      return view('recipes.show', compact('recipe','recipelinks','next','previous'));
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
   public function store(CreateRecipeRequest $request)
   {
      // if(!checkACL('author')) {
      //     return view('errors.403');
      // }

      $recipe = new Recipe;
         $recipe->title = $request->title;
         $recipe->ingredients = Purifier::clean($request->ingredients);
         $recipe->methodology = Purifier::clean($request->methodology);
         $recipe->category_id = $request->category_id;
         $recipe->published_at = $request->published_at;
         $recipe->servings = $request->servings;
         $recipe->prep_time = $request->prep_time;
         $recipe->cook_time = $request->cook_time;
         $recipe->personal = $request->personal;
         $recipe->source = $request->source;
         $recipe->author_notes = $request->author_notes;
         $recipe->public_notes = $request->public_notes;
         $recipe->modified_by_id = Auth::user()->id;
         $recipe->last_viewed_by_id = Auth::user()->id;
         $recipe->last_viewed_on = Carbon::Now();
         $recipe->user_id = Auth::user()->id;
      $recipe->save();

      // Save entry to log file using built-in Monolog
      //Log::info(Auth::user()->username . " (" . Auth::user()->id . ") CREATED article (" . $article->id . ")\r\n", [json_decode($article, true)]
      //);

      Session::flash('success','The article has been created successfully!');
      return redirect()->route($request->ref);
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
      // if(!checkACL('guest')) {
      //     return view('errors.403');
      // }

      $recipes = Recipe::with('user','category')->onlyTrashed()->get();
      return view('recipes.trashed', compact('recipes'));
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
      $ref = app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName();

      $this->validate($request, [
         'checked' => 'required',
      ]);

      $checked = $request->input('checked');
      //dd($checked);

      Recipe::destroy($checked);

      Session::flash('success','The recipes were trashed successfully.');
      return redirect()->route($ref);
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

      $recipe = Recipe::find($id);
         $recipe->published_at = NULL;
         // $article->favoriteArticles()->delete(); // Remove associated rows from article_user (favorites table)
        
         $favorites = DB::select('select * from recipe_user where recipe_id = '. $id, [1]);
         //dd ($favorites);
         foreach($favorites as $favorite) {
            //dd($favorite);
            $recipe->favorites()->detach($favorite);
         }
      $recipe->save();

      Session::flash ('success','The recipe was successfully unpublished.');
      //return redirect()->route($ref);
      return redirect()->route('recipes.show', $id);
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
      if(!checkACL('editor')) {
          return view('errors.403');
      }

      // Set the variable so we can use a button in other pages to come back to this page
      Session::put('backURL', Route::currentRouteName());

      //$alphas = range('A', 'Z');
        $alphas = DB::table('recipes')
         ->select(DB::raw('DISTINCT LEFT(title, 1) as letter'))
         // ->where('personal', '!=', 1)
         ->where('published_at','=', null)
         ->orderBy('letter')
         ->get();
         //dd($alphas);

      $letters = [];
      foreach($alphas as $alpha) {
         $letters[] = $alpha->letter;
      }

      // If $key value is passed
      if ($key) {
         $recipes = Recipe::with('user','category')->unpublished()
            ->where('title', 'like', $key . '%')
            ->orderBy('title', 'asc')
            ->get();
         return view('recipes.unpublished', compact('recipes','letters'));
      }

      // No $key value is passed
      $recipes = Recipe::with('user','category')->unpublished()->get();
      return view('recipes.unpublished', compact('recipes','letters'));
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
      $ref = app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName();

      $this->validate($request, [
         'checked' => 'required',
      ]);

      $checked = $request->input('checked');

      foreach ($checked as $item) {
         //dd($item);
         $recipe = Recipe::withTrashed()->find($item);
            $recipe->published_at = Null;

            // Delete related favorites
            $favorites = DB::select('select * from recipe_user where recipe_id = '. $recipe->id, [1]);
               foreach($favorites as $favorite) {
                  $recipe->favoriteRecipes()->detach($favorite);
               }
         $recipe->save();
      }
      

      Session::flash('success','The recipes were published successfully.');
      return redirect()->route($ref);
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
   public function update(UpdateRecipeRequest $request, $id)
   {
      // Get the recipe values from the database
      $recipe = Recipe::find($id);

      // save the data in the database
      $recipe->title = $request->title;
      $recipe->ingredients = Purifier::clean($request->ingredients);
      $recipe->methodology = Purifier::clean($request->methodology);
      $recipe->category_id = $request->category_id;
      $recipe->published_at = $request->published_at;
      $recipe->servings = $request->servings;
      $recipe->prep_time = $request->prep_time;
      $recipe->cook_time = $request->cook_time;
      $recipe->personal = $request->personal;
      $recipe->source = $request->source;
      $recipe->author_notes = $request->author_notes;
      $recipe->public_notes = $request->public_notes;
      $recipe->modified_by_id = Auth::user()->id;
      $recipe->last_viewed_by_id = Auth::user()->id;
      $recipe->last_viewed_on = Carbon::Now();

      // Check if a new image was submitted
      if ($request->hasFile('image')) {
         //Add new photo
         $image = $request->file('image');
         $filename = time() . '.' . $image->getClientOriginalExtension();
         $location = public_path('_recipes/' . $filename);
         Image::make($image)->resize(800, 400)->save($location);

         // get name of old image
         $oldImageName = $recipe->image;
         //dd($oldImageName);

         // Update database
         $recipe->image = $filename;

         // Delete old photo
         //Storage::delete($oldImageName);
         File::delete('_recipes/'.$oldImageName);
      }

      $recipe->save();

      // Save entry to log file using built-in Monolog
      //Log::info(Auth::user()->username . " (" . Auth::user()->id . ") updated :: Recipe (" . $recipe->id .")");

      // set a flash message to be displayed on screen
      Session::flash('success','The recipe was successfully updated!');
      // redirect to another page
      //return redirect()->route('recipes.index');
      return redirect(Session::get('fullURL'));
  }


}
