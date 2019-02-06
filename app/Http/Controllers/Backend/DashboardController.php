<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
//use Charts;
use App\Album;
use App\Article;
use App\Category;
use App\Comment;
use App\Module;
use App\Post;
use App\Recipe;
use App\Role;
use App\User;
use App\WoodProject;

class dashboardController extends Controller
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
		$this->middleware('auth');
		//Log::useFiles(storage_path().'/logs/articles.log');
		//Log::useFiles(storage_path().'/logs/audits.log');
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
		$roles = Role::with('users')->where('id', '<', 80)->get();
		// $authors = User::where('role_id', '=' , )
		// $sadmins = User::with('role')->where('role_id','=',10)->get();
		// $admins = User::with('role')->where('role_id','=',20)->get();
		// $managers = User::with('role')->where('role_id','=',30)->get();
		// $publishers = User::with('role')->where('role_id','=',40)->get();
		// $editors = User::with('role')->where('role_id','=',50)->get();
		// $timetrackers = User::with('role')->where('role_id','=',55)->get();
		// $authors = User::with('role')->where('role_id','=',60)->get();
		// $users = User::with('role')->where('role_id','=',70)->get();
		// $users = User::with('role')->get();
		//dd($authors);

		$albums = Album::where('created_at', '>=' , Auth::user()->last_login_date)->get();
		$articles = Article::with('user')->where('created_at', '>=' , Auth::user()->last_login_date)->get();
		$categories = Category::where('created_at', '>=' , Auth::user()->last_login_date)->get();
		$comments = Comment::where('created_at', '>=' , Auth::user()->last_login_date)->get();
		$modules = Module::where('created_at', '>=' , Auth::user()->last_login_date)->get();
		$posts = Post::with('user')->where('created_at', '>=' , Auth::user()->last_login_date)->get();
		$recipes = Recipe::with('user')->where('created_at', '>=' , Auth::user()->last_login_date)->get();
		$roles1 = Role::where('created_at', '>=' , Auth::user()->last_login_date)->get();
		$users = User::where('created_at', '>=' , Auth::user()->last_login_date)->get();
		$woodProjects = WoodProject::where('created_at', '>=' , Auth::user()->last_login_date)->get();

		// return view('backend.dashboard', compact('roles','sadmins', 'admins','managers','publishers','editors','timetrackers','authors','users'));
		return view('backend.dashboard', compact('albums','articles','categories','comments','modules','posts','recipes','roles','roles1','users','woodProjects'));
		
	}


##################################################################################################################
# ██████╗  ██████╗ ███████╗████████╗███████╗
# ██╔══██╗██╔═══██╗██╔════╝╚══██╔══╝██╔════╝
# ██████╔╝██║   ██║███████╗   ██║   ███████╗
# ██╔═══╝ ██║   ██║╚════██║   ██║   ╚════██║
# ██║     ╚██████╔╝███████║   ██║   ███████║
# ╚═╝      ╚═════╝ ╚══════╝   ╚═╝   ╚══════╝
##################################################################################################################
	public function posts()
	{
		return view('backend.posts.index');
	}


##################################################################################################################
# ██╗████████╗███████╗███╗   ███╗███████╗
# ██║╚══██╔══╝██╔════╝████╗ ████║██╔════╝
# ██║   ██║   █████╗  ██╔████╔██║███████╗
# ██║   ██║   ██╔══╝  ██║╚██╔╝██║╚════██║
# ██║   ██║   ███████╗██║ ╚═╝ ██║███████║
# ╚═╝   ╚═╝   ╚══════╝╚═╝     ╚═╝╚══════╝
##################################################################################################################
	public function items()
	{
		return view('backend.items.index');
	}


##################################################################################################################
# ██████╗ ███████╗ ██████╗██╗██████╗ ███████╗███████╗
# ██╔══██╗██╔════╝██╔════╝██║██╔══██╗██╔════╝██╔════╝
# ██████╔╝█████╗  ██║     ██║██████╔╝█████╗  ███████╗
# ██╔══██╗██╔══╝  ██║     ██║██╔═══╝ ██╔══╝  ╚════██║
# ██║  ██║███████╗╚██████╗██║██║     ███████╗███████║
# ╚═╝  ╚═╝╚══════╝ ╚═════╝╚═╝╚═╝     ╚══════╝╚══════╝
##################################################################################################################
	public function recipes()
	{
		return view('backend.recipes.index');
	}


##################################################################################################################
# ██████╗ ██████╗  ██████╗ ██████╗ ██╗   ██╗ ██████╗████████╗███████╗
# ██╔══██╗██╔══██╗██╔═══██╗██╔══██╗██║   ██║██╔════╝╚══██╔══╝██╔════╝
# ██████╔╝██████╔╝██║   ██║██║  ██║██║   ██║██║        ██║   ███████╗
# ██╔═══╝ ██╔══██╗██║   ██║██║  ██║██║   ██║██║        ██║   ╚════██║
# ██║     ██║  ██║╚██████╔╝██████╔╝╚██████╔╝╚██████╗   ██║   ███████║
# ╚═╝     ╚═╝  ╚═╝ ╚═════╝ ╚═════╝  ╚═════╝  ╚═════╝   ╚═╝   ╚══════╝
##################################################################################################################
	public function products()
	{
		return view('backend.products.index');
	}





}