<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;
use App\Post;
use App\Recipe;
use App\User;
use App\WoodProject;
use Carbon\Carbon;
use Auth;
use DB;

use App\Mail\DemoMail;
use Mail;

class HomeController extends Controller
{

##################################################################################################################
#  ██████╗ ██████╗ ███╗   ██╗███████╗████████╗██████╗ ██╗   ██╗ ██████╗████████╗
# ██╔════╝██╔═══██╗████╗  ██║██╔════╝╚══██╔══╝██╔══██╗██║   ██║██╔════╝╚══██╔══╝
# ██║     ██║   ██║██╔██╗ ██║███████╗   ██║   ██████╔╝██║   ██║██║        ██║   
# ██║     ██║   ██║██║╚██╗██║╚════██║   ██║   ██╔══██╗██║   ██║██║        ██║   
# ╚██████╗╚██████╔╝██║ ╚████║███████║   ██║   ██║  ██║╚██████╔╝╚██████╗   ██║   
#  ╚═════╝ ╚═════╝ ╚═╝  ╚═══╝╚══════╝   ╚═╝   ╚═╝  ╚═╝ ╚═════╝  ╚═════╝   ╚═╝   
##################################################################################################################
	public function __construct()
	{
		//$this->middleware('auth')->except('index','about','contact');
	}


##################################################################################################################
# ██╗  ██╗ ██████╗ ███╗   ███╗███████╗██████╗  █████╗  ██████╗ ███████╗
# ██║  ██║██╔═══██╗████╗ ████║██╔════╝██╔══██╗██╔══██╗██╔════╝ ██╔════╝
# ███████║██║   ██║██╔████╔██║█████╗  ██████╔╝███████║██║  ███╗█████╗  
# ██╔══██║██║   ██║██║╚██╔╝██║██╔══╝  ██╔═══╝ ██╔══██║██║   ██║██╔══╝  
# ██║  ██║╚██████╔╝██║ ╚═╝ ██║███████╗██║     ██║  ██║╚██████╔╝███████╗
# ╚═╝  ╚═╝ ╚═════╝ ╚═╝     ╚═╝╚══════╝╚═╝     ╚═╝  ╚═╝ ╚═════╝ ╚══════╝
// Display a list of resources
##################################################################################################################
	public function index()
	{

		// Get list of articles by year and month
		$articlelinks = DB::table('articles')
			->select(DB::raw('YEAR(created_at) year, MONTH(created_at) month, MONTHNAME(created_at) month_name, COUNT(*) article_count'))
			->where('published_at', '<=', Carbon::now())
			//->where('created_at', '<=', Carbon::now()->subMonth(3))
			->groupBy('year')->groupBy('month')->orderBy('year', 'desc')->orderBy('month', 'desc')->get();

		// Get list of posts by year and month
		$postlinks = DB::table('posts')
			->select(DB::raw('YEAR(created_at) year, MONTH(created_at) month, MONTHNAME(created_at) month_name, COUNT(*) post_count'))
			->where('published_at', '<=', Carbon::now())
			->groupBy('year')->groupBy('month')->orderBy('year', 'desc')->orderBy('month', 'desc')->get();

		// Get list of recips by year and month
		$recipelinks = DB::table('recipes')
			->select(DB::raw('YEAR(published_at) year, MONTH(published_at) month, MONTHNAME(published_at) month_name, COUNT(*) recipe_count'))
			->where('published_at', '<=', Carbon::now())
			->groupBy('year')->groupBy('month')->orderBy('year', 'desc')->orderBy('month', 'desc')->get();

		$posts = Post::published()->with('user')->orderBy('created_at','desc')->take(5)->get();
		$woodprojects = WoodProject::all()->random(5);

		$popularArticle = Article::published()->get()->sortByDesc('views')->take(1);
		$popularPost = Post::published()->get()->sortByDesc('views')->take(1);
		$popularRecipe = Recipe::published()->get()->sortByDesc('views')->take(1);
		$popularWoodProject = WoodProject::get()->sortByDesc('views')->take(1);

		return view('frontend.homepage', compact('posts', 'popularArticle', 'popularPost', 'popularRecipe', 'articlelinks', 'postlinks', 'recipelinks', 'woodprojects', 'popularWoodProject'));
	}


##################################################################################################################
#  █████╗ ██████╗  ██████╗ ██╗   ██╗████████╗
# ██╔══██╗██╔══██╗██╔═══██╗██║   ██║╚══██╔══╝
# ███████║██████╔╝██║   ██║██║   ██║   ██║   
# ██╔══██║██╔══██╗██║   ██║██║   ██║   ██║   
# ██║  ██║██████╔╝╚██████╔╝╚██████╔╝   ██║   
# ╚═╝  ╚═╝╚═════╝  ╚═════╝  ╚═════╝    ╚═╝   
##################################################################################################################
	public function about()
	{
		return view('frontend.about');
	}


##################################################################################################################
#  ██████╗ ██████╗ ███╗   ██╗████████╗ █████╗  ██████╗████████╗
# ██╔════╝██╔═══██╗████╗  ██║╚══██╔══╝██╔══██╗██╔════╝╚══██╔══╝
# ██║     ██║   ██║██╔██╗ ██║   ██║   ███████║██║        ██║   
# ██║     ██║   ██║██║╚██╗██║   ██║   ██╔══██║██║        ██║   
# ╚██████╗╚██████╔╝██║ ╚████║   ██║   ██║  ██║╚██████╗   ██║   
#  ╚═════╝ ╚═════╝ ╚═╝  ╚═══╝   ╚═╝   ╚═╝  ╚═╝ ╚═════╝   ╚═╝   
##################################################################################################################
	public function contact()
	{
		return view('frontend.contact');
	}


##################################################################################################################
# ██████╗ ██╗      ██████╗  ██████╗ 
# ██╔══██╗██║     ██╔═══██╗██╔════╝ 
# ██████╔╝██║     ██║   ██║██║  ███╗
# ██╔══██╗██║     ██║   ██║██║   ██║
# ██████╔╝███████╗╚██████╔╝╚██████╔╝
# ╚═════╝ ╚══════╝ ╚═════╝  ╚═════╝ 
##################################################################################################################
	public function blog()
	{
		return view('frontend.blog.index');
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

		if(!checkACL('guest')) {
			 return view('errors.frontend.403');
			// abort(403);
		}
			
		return view('frontend.items.index');
	}


##################################################################################################################
# ███████╗██╗  ██╗ ██████╗ ██████╗ 
# ██╔════╝██║  ██║██╔═══██╗██╔══██╗
# ███████╗███████║██║   ██║██████╔╝
# ╚════██║██╔══██║██║   ██║██╔═══╝ 
# ███████║██║  ██║╚██████╔╝██║     
# ╚══════╝╚═╝  ╚═╝ ╚═════╝ ╚═╝     
##################################################################################################################
	public function shop()
	{
		return view('frontend.shop.index');
	}


##################################################################################################################
# ██████╗  ██████╗ ███████╗████████╗     ██████╗ ██████╗ ███╗   ██╗████████╗ █████╗  ██████╗████████╗
# ██╔══██╗██╔═══██╗██╔════╝╚══██╔══╝    ██╔════╝██╔═══██╗████╗  ██║╚══██╔══╝██╔══██╗██╔════╝╚══██╔══╝
# ██████╔╝██║   ██║███████╗   ██║       ██║     ██║   ██║██╔██╗ ██║   ██║   ███████║██║        ██║   
# ██╔═══╝ ██║   ██║╚════██║   ██║       ██║     ██║   ██║██║╚██╗██║   ██║   ██╔══██║██║        ██║   
# ██║     ╚██████╔╝███████║   ██║       ╚██████╗╚██████╔╝██║ ╚████║   ██║   ██║  ██║╚██████╗   ██║   
# ╚═╝      ╚═════╝ ╚══════╝   ╚═╝        ╚═════╝ ╚═════╝ ╚═╝  ╚═══╝   ╚═╝   ╚═╝  ╚═╝ ╚═════╝   ╚═╝   
##################################################################################################################
// public function postContact(Request $request) {
// 		// used to submit the info from the contact page to the database
// 		$this->validate($request, [
// 			'email'		=> 'required|email',
// 			'subject'	=> 'required|min:3',
// 			'message'	=> 'required|min:10'
// 		]);

// 		$data = array(
// 			'email'			=> $request->email,
// 			'subject'		=> $request->subject,
// 			'bodyMessage'	=> $request->message
// 		);

// 		// $token = $request->input('g-recaptcha-response');

// 		// if ($token) {
// 		// 	$client = new Client(); //Initialize a new Guzzle object
// 		// 	$response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
// 		// 		'form_params' => array(
// 		// 			'secret' 	=> '6LduZyYTAAAAABwoIAzzUhovfTPOFBwvPclynrNO',
// 		// 			'response'	=> $token
// 		// 			)
// 		// 		]);
// 		// 	$results = json_decode($response->getBody()->getContents());

// 		// 	if ($results->success) {
// 		// 		Session::flash('success','Yes we know you are human');
// 		// 	} else {
// 		// 		Session::flash('error','You are probably a robot');
// 		// 	}
// 		// }

// 		// use Mail::queue() to send multiple emails at a later time
// 		Mail::send('emails.contact', $data, function($message) use ($data) {
// 			$message->from($data['email']);
// 			$message->to('stleroux@hotmail.ca');
// 			$message->subject($data['subject']);
// 		}); 

// 		// Save entry to log file using built-in Monolog
// 		// if(Auth::check()) {
// 		// 	Log::info(Auth::user()->username . " (" . Auth::user()->id . ") submitted :: Contact");
// 		// }else{
// 		// 	Log::info(getClientIP() . " submitted :: Contact");
// 		// }

// 		Session::flash('success','Your email was sent!');
// 		return redirect()->url('/');
// 	}


##################################################################################################################
# ██████╗  ██████╗ ███████╗████████╗     ██████╗ ██████╗ ███╗   ██╗████████╗ █████╗  ██████╗████████╗
# ██╔══██╗██╔═══██╗██╔════╝╚══██╔══╝    ██╔════╝██╔═══██╗████╗  ██║╚══██╔══╝██╔══██╗██╔════╝╚══██╔══╝
# ██████╔╝██║   ██║███████╗   ██║       ██║     ██║   ██║██╔██╗ ██║   ██║   ███████║██║        ██║   
# ██╔═══╝ ██║   ██║╚════██║   ██║       ██║     ██║   ██║██║╚██╗██║   ██║   ██╔══██║██║        ██║   
# ██║     ╚██████╔╝███████║   ██║       ╚██████╗╚██████╔╝██║ ╚████║   ██║   ██║  ██║╚██████╗   ██║   
# ╚═╝      ╚═════╝ ╚══════╝   ╚═╝        ╚═════╝ ╚═════╝ ╚═╝  ╚═══╝   ╚═╝   ╚═╝  ╚═╝ ╚═════╝   ╚═╝   
##################################################################################################################
	public function postContact(Request $request)
	{
		$email = Auth::user()->email;
		//dd($email);
		Mail::to($email)->send(new DemoMail());
		return view('homepage');
	}


##################################################################################################################
# ███╗   ███╗███████╗███╗   ███╗██████╗ ███████╗██████╗ ███████╗
# ████╗ ████║██╔════╝████╗ ████║██╔══██╗██╔════╝██╔══██╗██╔════╝
# ██╔████╔██║█████╗  ██╔████╔██║██████╔╝█████╗  ██████╔╝███████╗
# ██║╚██╔╝██║██╔══╝  ██║╚██╔╝██║██╔══██╗██╔══╝  ██╔══██╗╚════██║
# ██║ ╚═╝ ██║███████╗██║ ╚═╝ ██║██████╔╝███████╗██║  ██║███████║
# ╚═╝     ╚═╝╚══════╝╚═╝     ╚═╝╚═════╝ ╚══════╝╚═╝  ╚═╝╚══════╝
##################################################################################################################
	public function members()
	{
		$members = User::where('role_id','!=',10)->orderBy('username','asc')->get();
		return view('frontend.members', compact('members'));
	}


##################################################################################################################
# ████████╗███████╗███████╗████████╗
# ╚══██╔══╝██╔════╝██╔════╝╚══██╔══╝
#    ██║   █████╗  ███████╗   ██║   
#    ██║   ██╔══╝  ╚════██║   ██║   
#    ██║   ███████╗███████║   ██║   
#    ╚═╝   ╚══════╝╚══════╝   ╚═╝   
##################################################################################################################
	public function test()
	{
		return view('test');
	}



}
