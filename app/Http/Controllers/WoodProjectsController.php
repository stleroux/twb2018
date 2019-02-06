<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;
use App\Comment;
use App\WoodProject;
use Auth;
use DB;
use File;
use Image;
use Route;
use Session;

use App\Http\Requests\CreateWoodProjectRequest;
use App\Http\Requests\UpdateWoodProjectRequest;
use App\Http\Requests\CreateCommentRequest;

class WoodProjectsController extends Controller
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
#  █████╗ ██████╗ ███╗   ███╗██╗███╗   ██╗
# ██╔══██╗██╔══██╗████╗ ████║██║████╗  ██║
# ███████║██║  ██║██╔████╔██║██║██╔██╗ ██║
# ██╔══██║██║  ██║██║╚██╔╝██║██║██║╚██╗██║
# ██║  ██║██████╔╝██║ ╚═╝ ██║██║██║ ╚████║
# ╚═╝  ╚═╝╚═════╝ ╚═╝     ╚═╝╚═╝╚═╝  ╚═══╝
##################################################################################################################
	public function admin() {
		return view('woodProjects.admin.index');
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
		// find all projects categories in the categories table and pass them to the view
		$categories = Category::whereHas('module', function ($query) {
			$query->where('name', '=', 'wood projects');
		})->orderBy('name','asc')->get();

		// Create an empty array to store the categories
		$cats = [];

		// Store the category values into the $cats array
		foreach ($categories as $category) {
			$cats[$category->id] = $category->name;
		}

		// find all stain colors categories in the categories table and pass them to the view
		$stainColors = Category::whereHas('module', function ($query) {
			$query->where('name', '=', 'stain color');
		})->orderBy('name','asc')->get();

		// Create an empty array to store the categories
		$staincolors = [];

		// Store the category values into the $cats array
		foreach ($stainColors as $stainColor) {
			$staincolors[$stainColor->id] = $stainColor->name;
		}

		// find all stain sheens categories in the categories table and pass them to the view
		$stainSheens = Category::whereHas('module', function ($query) {
			$query->where('name', '=', 'stain sheen');
		})->orderBy('name','asc')->get();

		// Create an empty array to store the categories
		$stainsheens = [];

		// Store the category values into the $cats array
		foreach ($stainSheens as $stainSheen) {
			$stainsheens[$stainSheen->id] = $stainSheen->name;
		}

		// find all stain types categories in the categories table and pass them to the view
		$stainTypes = Category::whereHas('module', function ($query) {
			$query->where('name', '=', 'stain type');
		})->orderBy('name','asc')->get();

		// Create an empty array to store the categories
		$staintypes = [];

		// Store the category values into the $cats array
		foreach ($stainTypes as $stainType) {
			$staintypes[$stainType->id] = $stainType->name;
		}

		// find all wood species categories in the categories table and pass them to the view
		$woodSpecies = Category::whereHas('module', function ($query) {
			$query->where('name', '=', 'wood specie');
		})->orderBy('name','asc')->get();

		// Create an empty array to store the categories
		$woodspecies = [];

		// Store the category values into the $cats array
		foreach ($woodSpecies as $woodSpecie) {
			$woodspecies[$woodSpecie->id] = $woodSpecie->name;
		}

		// find all wood types categories in the categories table and pass them to the view
		$woodTypes = Category::whereHas('module', function ($query) {
			$query->where('name', '=', 'wood type');
		})->orderBy('name','asc')->get();

		// Create an empty array to store the categories
		$woodtypes = [];

		// Store the category values into the $cats array
		foreach ($woodTypes as $woodType) {
			$woodtypes[$woodType->id] = $woodType->name;
		}

		// find all wood types categories in the categories table and pass them to the view
		$finishTypes = Category::whereHas('module', function ($query) {
			$query->where('name', '=', 'finish type');
		})->orderBy('name','asc')->get();

		// Create an empty array to store the categories
		$finishtypes = [];

		// Store the category values into the $cats array
		foreach ($finishTypes as $finishType) {
			$finishtypes[$finishType->id] = $finishType->name;
		}

		// find all stain sheens categories in the categories table and pass them to the view
		$finishSheens = Category::whereHas('module', function ($query) {
			$query->where('name', '=', 'finish sheen');
		})->orderBy('name','asc')->get();

		// Create an empty array to store the categories
		$finishsheens = [];

		// Store the category values into the $cats array
		foreach ($finishSheens as $finishSheen) {
			$finishsheens[$finishSheen->id] = $finishSheen->name;
		}

		return view('woodProjects.create')
			->withCategories($cats)
			->withWoodSpecies($woodspecies)
			->withWoodTypes($woodtypes)
			->withStainTypes($staintypes)
			->withStainColors($staincolors)
			->withStainSheens($stainsheens)
			->withFinishTypes($finishtypes)
			->withFinishSheens($finishsheens)
		;
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
	public function destroy($id) {
		
		$project = WoodProject::find($id);
		//dd($project);
		foreach($project->projectImages as $photo) {
			unlink(public_path('_woodProjects/images/' . $project->id . "/" . $photo->new_name));
			unlink(public_path('_woodProjects/images/thumbs/' . $project->id . "/" . $photo->new_name));
			//Delete the photos of this project from the database
			$photo->delete();
		}

		// Delete the project cover image and it's thumbnail
		unlink(public_path('_woodProjects/main_images/' . $project->main_image));
		unlink(public_path('_woodProjects/main_images/thumbs/' . $project->main_image));
		
		// Delete the IMAGES/THUMBS folder matching the project id
		File::deleteDirectory(public_path('_woodProjects/images/thumbs/' . $project->id));
		// Delete the IMAGES folder matching the project id
		File::deleteDirectory(public_path('_woodProjects/images/' . $project->id));

		//Delete the project from the database
		$project->delete();

		Session::flash('success','Project and associated images have been deleted.');
		return redirect()->route('woodProjects.index');
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
		$project = WoodProject::find($id);

		// find all projects categories in the categories table and pass them to the view
		$categories = Category::whereHas('module', function ($query) {
			$query->where('name', '=', 'wood projects');
		})->orderBy('name','asc')->get();

		// Create an empty array to store the categories
		$cats = [];

		// Store the category values into the $cats array
		foreach ($categories as $category) {
			$cats[$category->id] = $category->name;
		}

		// find all stain colors categories in the categories table and pass them to the view
		$stainColors = Category::whereHas('module', function ($query) {
			$query->where('name', '=', 'stain color');
		})->orderBy('name','asc')->get();

		// Create an empty array to store the categories
		$staincolors = [];

		// Store the category values into the $cats array
		foreach ($stainColors as $stainColor) {
			$staincolors[$stainColor->id] = $stainColor->name;
		}

		// find all stain sheens categories in the categories table and pass them to the view
		$stainSheens = Category::whereHas('module', function ($query) {
			$query->where('name', '=', 'stain sheen');
		})->orderBy('name','asc')->get();

		// Create an empty array to store the categories
		$stainsheens = [];

		// Store the category values into the $cats array
		foreach ($stainSheens as $stainSheen) {
			$stainsheens[$stainSheen->id] = $stainSheen->name;
		}

		// find all stain types categories in the categories table and pass them to the view
		$stainTypes = Category::whereHas('module', function ($query) {
			$query->where('name', '=', 'stain type');
		})->orderBy('name','asc')->get();

		// Create an empty array to store the categories
		$staintypes = [];

		// Store the category values into the $cats array
		foreach ($stainTypes as $stainType) {
			$staintypes[$stainType->id] = $stainType->name;
		}

		// find all wood species categories in the categories table and pass them to the view
		$woodSpecies = Category::whereHas('module', function ($query) {
			$query->where('name', '=', 'wood specie');
		})->orderBy('name','asc')->get();

		// Create an empty array to store the categories
		$woodspecies = [];

		// Store the category values into the $cats array
		foreach ($woodSpecies as $woodSpecie) {
			$woodspecies[$woodSpecie->id] = $woodSpecie->name;
		}

		// find all wood types categories in the categories table and pass them to the view
		$woodTypes = Category::whereHas('module', function ($query) {
			$query->where('name', '=', 'wood type');
		})->orderBy('name','asc')->get();

		// Create an empty array to store the categories
		$woodtypes = [];

		// Store the category values into the $cats array
		foreach ($woodTypes as $woodType) {
			$woodtypes[$woodType->id] = $woodType->name;
		}

		// find all wood types categories in the categories table and pass them to the view
		$finishTypes = Category::whereHas('module', function ($query) {
			$query->where('name', '=', 'finish type');
		})->orderBy('name','asc')->get();

		// Create an empty array to store the categories
		$finishtypes = [];

		// Store the category values into the $cats array
		foreach ($finishTypes as $finishType) {
			$finishtypes[$finishType->id] = $finishType->name;
		}

		// find all stain sheens categories in the categories table and pass them to the view
		$finishSheens = Category::whereHas('module', function ($query) {
			$query->where('name', '=', 'finish sheen');
		})->orderBy('name','asc')->get();

		// Create an empty array to store the categories
		$finishsheens = [];

		// Store the category values into the $cats array
		foreach ($finishSheens as $finishSheen) {
			$finishsheens[$finishSheen->id] = $finishSheen->name;
		}
		
		return view('woodProjects.edit', compact('project'))
			->withCategories($cats)
			->withWoodSpecies($woodspecies)
			->withWoodTypes($woodtypes)
			->withStainTypes($staintypes)
			->withStainColors($staincolors)
			->withStainSheens($stainsheens)
			->withFinishTypes($finishtypes)
			->withFinishSheens($finishsheens)
		;
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
	public function index()
	{
		//$projects = Project::with('Images')->get();
		// $projects = WoodProject::orderBy('name','asc')->get();
		$projects = WoodProject::orderBy('name','asc')->paginate(8);
		//dd($projects);
		return view('woodProjects.index', compact('projects'));
	}


##################################################################################################################
#
#
# MANAGE IMAGES
#
#
#
// Display a list of resources
##################################################################################################################
	// public function manageImages($id)
	// {
	// 	//$projects = Project::with('Images')->get();
	// 	// $projects = WoodProject::orderBy('name','asc')->get();
	// 	//$projects = WoodProject::orderBy('name','asc')->paginate(8);
	// 	//dd($projects);
	// 	$project = WoodProject::find($id);
	// 	return view('woodProjects.manageImages', compact('project'));
	// }


##################################################################################################################
# ███╗   ██╗███████╗██╗    ██╗    ██████╗ ██████╗  ██████╗      ██╗███████╗ ██████╗████████╗███████╗
# ████╗  ██║██╔════╝██║    ██║    ██╔══██╗██╔══██╗██╔═══██╗     ██║██╔════╝██╔════╝╚══██╔══╝██╔════╝
# ██╔██╗ ██║█████╗  ██║ █╗ ██║    ██████╔╝██████╔╝██║   ██║     ██║█████╗  ██║        ██║   ███████╗
# ██║╚██╗██║██╔══╝  ██║███╗██║    ██╔═══╝ ██╔══██╗██║   ██║██   ██║██╔══╝  ██║        ██║   ╚════██║
# ██║ ╚████║███████╗╚███╔███╔╝    ██║     ██║  ██║╚██████╔╝╚█████╔╝███████╗╚██████╗   ██║   ███████║
# ╚═╝  ╚═══╝╚══════╝ ╚══╝╚══╝     ╚═╝     ╚═╝  ╚═╝ ╚═════╝  ╚════╝ ╚══════╝ ╚═════╝   ╚═╝   ╚══════╝
// Display a listing of the resource that were created since the user's last login.
##################################################################################################################
   public function newWoodProjects(Request $request, $key=null)
   {
      // if(!checkACL('guest')) {
      //     return view('errors.403');
      // }

      //$alphas = range('A', 'Z');
      $alphas = DB::table('woodprojects')
         ->select(DB::raw('DISTINCT LEFT(name, 1) as letter'))
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
         $projects = WoodProject::with('category')->newWoodProjects()
            ->where('name', 'like', $key . '%')
            ->get();
         return view('backend.woodProjects.newWoodProjects', compact('projects','letters'));
      }

      $projects = WoodProject::with('category')->newWoodProjects()->get();
      return view('backend.woodProjects.newWoodProjects', compact('projects','letters'));
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
	public function show($id) {

		// Set the variable so we can use a button in other pages to come back to this page
		//Session::put('backURL', Route::currentRouteName());
		Session::put('fullURL', \Request::fullUrl());

		// $project = Project::with('ImageProject')->find($id);
		$project = WoodProject::find($id);
		// dd($project);

		// get previous project id
		$previous = WoodProject::where('id', '<', $project->id)->max('id');

		// get next project id
		$next = WoodProject::where('id', '>', $project->id)->min('id');
		  
		// Add 1 to views column
		DB::table('woodprojects')->where('id','=',$project->id)->increment('views',1);

		return view('woodProjects.show', compact('project','previous','next'));
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
	public function store(CreateWoodProjectRequest $request) {
		
		// $this->validate($request, [
		// 	'name' => 'required',
		// 	'description' => 'required',
		// 	'category_id' => 'required',
		// 	'main_image' => 'required|image|max:1999'
		// ]);


		// Get the file object
		$file = $request->file('main_image');

		// Get file name with extension
		$filenameWithExt = $request->file('main_image')->getClientOriginalName();

		// Get just the filename
		$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

		// Get the extension
		$extension = $request->file('main_image')->getClientOriginalExtension();

		// Create the new filename
		$filenameToStore = $filename . '_' . time() . '.' . $extension;
		//return $filenameToStore;
		
		// Check if Gallery/Images folders exists
		if (!file_exists('_woodProjects/main_images')) {
			mkdir('_woodProjects/main_images', 0777, true);
		}

		// move the file to the correct location
		$file->move('_woodProjects/main_images', $filenameToStore);
		
		// Check if Thumbs folder exists under Images
		if (!file_exists('_woodProjects/main_images/thumbs')) {
			mkdir('_woodProjects/main_images/thumbs', 0777, true);
		}

		// Create thumbnail
		$thumb = Image::make('_woodProjects/main_images/' . $filenameToStore)
			->resize(240,160)
			->save('_woodProjects/main_images/thumbs/' . $filenameToStore, 60);

		//Create album
		$project = new WoodProject;
			$project->category_id = $request->input('category_id');
			$project->name = $request->input('name');
			$project->description = $request->input('description');
			$project->main_image = $filenameToStore;
			$project->time_invested = $request->input('time_invested');
			$project->price = $request->input('price');
			$project->wood_specie_id = $request->input('wood_specie_id');
			$project->wood_type_id = $request->input('wood_type_id');
			$project->width = $request->input('width');
			$project->depth = $request->input('depth');
			$project->height = $request->input('height');
			$project->stain_type_id = $request->input('stain_type_id');
			$project->stain_color_id = $request->input('stain_color_id');
			$project->stain_sheen_id = $request->input('stain_sheen_id');
			$project->finish_type_id = $request->input('finish_type_id');
			$project->finish_sheen_id = $request->input('finish_sheen_id');
			$project->completed_at = $request->input('completed_at');
			$project->weight = $request->input('weight');
		$project->save();

		Session::flash('success','Project created.');
		return redirect()->route('woodProjects.index');
	}


##################################################################################################################
# ███████╗████████╗ ██████╗ ██████╗ ███████╗     ██████╗ ██████╗ ███╗   ███╗███╗   ███╗███████╗███╗   ██╗████████╗
# ██╔════╝╚══██╔══╝██╔═══██╗██╔══██╗██╔════╝    ██╔════╝██╔═══██╗████╗ ████║████╗ ████║██╔════╝████╗  ██║╚══██╔══╝
# ███████╗   ██║   ██║   ██║██████╔╝█████╗      ██║     ██║   ██║██╔████╔██║██╔████╔██║█████╗  ██╔██╗ ██║   ██║   
# ╚════██║   ██║   ██║   ██║██╔══██╗██╔══╝      ██║     ██║   ██║██║╚██╔╝██║██║╚██╔╝██║██╔══╝  ██║╚██╗██║   ██║   
# ███████║   ██║   ╚██████╔╝██║  ██║███████╗    ╚██████╗╚██████╔╝██║ ╚═╝ ██║██║ ╚═╝ ██║███████╗██║ ╚████║   ██║   
# ╚══════╝   ╚═╝    ╚═════╝ ╚═╝  ╚═╝╚══════╝     ╚═════╝ ╚═════╝ ╚═╝     ╚═╝╚═╝     ╚═╝╚══════╝╚═╝  ╚═══╝   ╚═╝   
##################################################################################################################
	// public function storeComment(CreateCommentRequest $request, $id)
	public function storeComment(CreateCommentRequest $request, $id)
	{
		//dd($id);
		$project = woodProject::find($id);
		//dd($project);

		$comment = new Comment();
			// $comment->name = $request->name;
			// $comment->email = $request->email;
			$comment->user_id = Auth::user()->id;
			$comment->comment = $request->comment;
			$project->comments()->save($comment);
		$comment->save();

		// Save entry to log file using built-in Monolog
		// if (Auth::check()) {
		//     Log::info(Auth::user()->username . " (" . Auth::user()->id . ") commented on post (" . $post->id . ")\r\n", [json_decode($comment, true)]);
		// } else {
		//     Log::info(Request::ip() . " commented on post " . $post->id);
		// }

		Session::flash('success', 'Comment added succesfully.');
		return redirect()->route('woodProjects.show', $project->id);
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
	public function update(UpdateWoodProjectRequest $request, $id)
	{
		// $this->validate($request, [
		// 	'name' => 'required',
		// 	'description' => 'required',
		// 	'category_id' => 'required',
		// 	'main_image' => 'sometimes|image|max:1999'
		// ]);

		// if(!checkACL('author')) {
		//     return view('errors.403');
		// }

		//dd($request->ref);

		if($request->file('main_image')) {
			$project = WoodProject::find($id);
			// Delete the project cover image and it's thumbnail
			unlink(public_path('_woodProjects/main_images/' . $project->main_image));
			unlink(public_path('_woodProjects/main_images/thumbs/' . $project->main_image));

			// Get the file object
			$file = $request->file('main_image');

			// Get file name with extension
			$filenameWithExt = $request->file('main_image')->getClientOriginalName();

			// Get just the filename
			$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

			// Get the extension
			$extension = $request->file('main_image')->getClientOriginalExtension();

			// Create the new filename
			$filenameToStore = $filename . '_' . time() . '.' . $extension;
			//return $filenameToStore;
			
			// Check if Gallery/Images folders exists
			if (!file_exists('_woodProjects/main_images')) {
				mkdir('_woodProjects/main_images', 0777, true);
			}

			// move the file to the correct location
			$file->move('_woodProjects/main_images', $filenameToStore);
			
			// Check if Thumbs folder exists under Images
			if (!file_exists('_woodProjects/main_images/thumbs')) {
				mkdir('_woodProjects/main_images/thumbs', 0777, true);
			}

			// Create thumbnail
			$thumb = Image::make('_woodProjects/main_images/' . $filenameToStore)
				->resize(240,160)
				->save('_woodProjects/main_images/thumbs/' . $filenameToStore, 60);
		}

		$project = WoodProject::findOrFail($id);
			$project->category_id = $request->input('category_id');
			$project->name = $request->input('name');
			$project->description = $request->input('description');
			if ($request->file('main_image')) {
				$project->main_image = $filenameToStore;
			}
			$project->time_invested = $request->input('time_invested');
			$project->price = $request->input('price');
			$project->wood_specie_id = $request->input('wood_specie_id');
			$project->wood_type_id = $request->input('wood_type_id');
			$project->width = $request->input('width');
			$project->depth = $request->input('depth');
			$project->height = $request->input('height');
			$project->stain_type_id = $request->input('stain_type_id');
			$project->stain_color_id = $request->input('stain_color_id');
			$project->stain_sheen_id = $request->input('stain_sheen_id');
			$project->finish_type_id = $request->input('finish_type_id');
			$project->finish_sheen_id = $request->input('finish_sheen_id');
			$project->completed_at = $request->input('completed_at');
			$project->weight = $request->input('weight');
		$project->save();
		
		// Save entry to log file using built-in Monolog
		//Log::info(Auth::user()->username . " (" . Auth::user()->id . ") UPDATED article (" . $article->id . ")\r\n",
		//    [json_decode($article, true)]
		//);

		Session::flash('success','The project has been updated successfully.');
		//return redirect()->route($request->ref);
		return redirect()->route('woodProjects.index');
	}


}
