<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
//use Charts;
use App\Album;
use App\Article;
use App\Category;
use App\Comment;
use App\Client;
use App\Invoice;
use App\InvoiceItem;
use App\Module;
use App\Post;
use App\Product;
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
		$this->middleware('auth')->except(['invoicer_dashboard']);
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
		$roles = Role::where('id','<=',70)->orderBy('name','asc')->pluck('display_name','id');

		$newAlbums = Album::where('created_at', '>=' , Auth::user()->last_login_date)->get();
		$newArticles = Article::with('user')->where('created_at', '>=' , Auth::user()->last_login_date)->get();
		$newCategories = Category::where('created_at', '>=' , Auth::user()->last_login_date)->get();
		$newComments = Comment::where('created_at', '>=' , Auth::user()->last_login_date)->get();
		$newModules = Module::where('created_at', '>=' , Auth::user()->last_login_date)->get();
		$newPosts = Post::with('user')->where('created_at', '>=' , Auth::user()->last_login_date)->get();
		$newRecipes = Recipe::with('user')->where('created_at', '>=' , Auth::user()->last_login_date)->get();
		$newRoles = Role::where('created_at', '>=' , Auth::user()->last_login_date)->get();
		$newUsers = User::where('created_at', '>=' , Auth::user()->last_login_date)->get();
		$newWoodProjects = WoodProject::where('created_at', '>=' , Auth::user()->last_login_date)->get();
		

		return view('dashboard', compact('newAlbums','newArticles','newCategories','newComments','newModules','newPosts','newRecipes','newRoles','roles','newUsers','newWoodProjects'));
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
		return view('posts.index');
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
		return view('items.index');
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
		return view('recipes.index');
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
		return view('products.index');
	}


	public function invoicer_dashboard() 
	{
      $clients = Client::all();
      $invoices = Invoice::all();
      $invoiceItems = InvoiceItem::all();
      $products = Product::all();
      
		return view('invoicer.dashboard.index', compact('clients', 'invoices', 'invoiceItems', 'products'));
	}


}