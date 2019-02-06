<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Comment;
use App\Post;
use App\Http\Requests;
use DB;
use Session;
use Carbon\Carbon;
use Auth;
use Log;
use Redirect;

use App\Http\Requests\CreateCommentRequest;

class BlogController extends Controller
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
		//Log::useFiles(storage_path().'/logs/audits.log');
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

		// Get list of posts by year and month
		$postlinks = DB::table('posts')
			->select(DB::raw('YEAR(created_at) year, MONTH(created_at) month, MONTHNAME(created_at) month_name, COUNT(*) post_count'))
			->where('published_at', '<=', Carbon::now())
			//->where('created_at', '<=', Carbon::now()->subMonth(3))
			->groupBy('year')
			->groupBy('month')
			->orderBy('year', 'desc')
			->orderBy('month', 'desc')
			->get();

		$archives = Post::published()->with('user')->whereYear('created_at','=', $year)
			->whereMonth('created_at','=', $month)
			->get();

		// Save the URL in a varibale so it can be used in the blog.single page to redirect the user to the archives list page
		Session::flash('backUrl', \Request::fullUrl());

		return view('blog.archive', compact('archives','postlinks'))->withYear($year)->withMonth($month);
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
	public function getIndex()
	{
		// Save entry to log file using built-in Monolog
		// if(Auth::check()) {
		// 	Log::info(Auth::user()->username . " (" . Auth::user()->id . ") accessed :: Blog");
		// }else{
		// 	Log::info(getClientIP() . " accessed :: Blog");
		// }

		// $popularPost = Post::get()->sortByDesc('views')->take(1);
		//dd($popularPost);
		$posts = Post::published()->with('user')->orderBy('id','desc')->paginate(5);//->get();

		// Get list of posts by year and month
		$postlinks = DB::table('posts')
			->select(DB::raw('YEAR(created_at) year, MONTH(created_at) month, MONTHNAME(created_at) month_name, COUNT(*) post_count'))
			->where('published_at', '<=', Carbon::now())
			//->where('created_at', '<=', Carbon::now()->subMonth(3))
			->groupBy('year')
			->groupBy('month')
			->orderBy('year', 'desc')
			->orderBy('month', 'desc')
			->get();

		// return view ('blog.index', compact('posts','popularPost'));
		return view ('blog.index', compact('posts','postlinks'));
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

		$post = Post::find($id);

		// Save entry to log file using built-in Monolog
		// Log::info(Auth::user()->username . " (" . Auth::user()->id . ") PRINTED article (" . $article->id . ")\r\n", 
		// 	[json_decode($article, true)]
		// );

		return view('blog.print', compact('post'));
	}


##################################################################################################################
# ███████╗███████╗ █████╗ ██████╗  ██████╗██╗  ██╗
# ██╔════╝██╔════╝██╔══██╗██╔══██╗██╔════╝██║  ██║
# ███████╗█████╗  ███████║██████╔╝██║     ███████║
# ╚════██║██╔══╝  ██╔══██║██╔══██╗██║     ██╔══██║
# ███████║███████╗██║  ██║██║  ██║╚██████╗██║  ██║
# ╚══════╝╚══════╝╚═╝  ╚═╝╚═╝  ╚═╝ ╚═════╝╚═╝  ╚═╝
##################################################################################################################
	 public function search(Request $request)
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

		// Get list of posts by year and month
		$postlinks = DB::table('posts')
			->select(DB::raw('YEAR(created_at) year, MONTH(created_at) month, MONTHNAME(created_at) month_name, COUNT(*) post_count'))
			->where('published_at', '<=', Carbon::now())
			//->where('created_at', '<=', Carbon::now()->subMonth(3))
			->groupBy('year')
			->groupBy('month')
			->orderBy('year', 'desc')
			->orderBy('month', 'desc')
			->get();

		  // Save entry to log file using built-in Monolog
		  // if (Auth::check()) {
		  //     Log::info(Auth::user()->username . " (" . Auth::user()->id . ") searched posts for " . $search);
		  // } else {
		  //     Log::info("Guest searched posts for \"" . $search . "\"");
		  // }

		  return view('blog.search', compact('posts','postlinks'));
	 }


	// public function viewImage($id)
	// {
	// 	// Save entry to log file using built-in Monolog
	// 	if(Auth::check()) {
	// 		Log::info(Auth::user()->username . " (" . Auth::user()->id . ") viewed :: Image of Post (" . $id . ")");
	// 	}else{
	// 		//Log::info(getClientIP() . " viewed :: Post id (" . $post->id . ")";
	// 		Log::info(getClientIP() . " viewed :: Image of Post (" . $id . ")");
	// 	}
	// }


##################################################################################################################
# ███████╗██╗  ██╗ ██████╗ ██╗    ██╗
# ██╔════╝██║  ██║██╔═══██╗██║    ██║
# ███████╗███████║██║   ██║██║ █╗ ██║
# ╚════██║██╔══██║██║   ██║██║███╗██║
# ███████║██║  ██║╚██████╔╝╚███╔███╔╝
# ╚══════╝╚═╝  ╚═╝ ╚═════╝  ╚══╝╚══╝ 
// Display the specified resource
##################################################################################################################
	public function getSingle($slug)
	{
		// fetch from database based on slug
		$post = Post::where('slug', '=', $slug)->first();
		//dd($post->id);

		// get previous post id
		$previous = Post::published()->where('id', '<', $post->id)->max('id');
		// get slug if record exists
		if($previous = Post::published()->find($previous)) {
			$previous = $previous->slug;
		}

		// get next post id
		$next = Post::published()->where('id', '>', $post->id)->min('id');
		// get slug if record exists
		if($next = Post::published()->find($next)) {
			$next = $next->slug;
		}

		// Add 1 to views column
		DB::table('posts')->where('slug', '=', $slug)->increment('views', 1);

		// Get list of posts by year and month
		$postlinks = DB::table('posts')
			->select(DB::raw('YEAR(created_at) year, MONTH(created_at) month, MONTHNAME(created_at) month_name, COUNT(*) post_count'))
			->where('published_at', '<=', Carbon::now())
			//->where('created_at', '<=', Carbon::now()->subMonth(3))
			->groupBy('year')
			->groupBy('month')
			->orderBy('year', 'desc')
			->orderBy('month', 'desc')
			->get();

		//$post->save();

		// Save entry to log file using built-in Monolog
		// if(Auth::check()) {
			// Log::info(Auth::user()->username . " (" . Auth::user()->id . ") viewed :: Post (" . $post->id . ")");
		// }else{
			//Log::info(getClientIP() . " viewed :: Post id (" . $post->id . ")";
			// Log::info(getClientIP() . " viewed :: Post (" . $post->id . ")");
		// }

		// return the view and pass in the post object
		return view('blog.single', compact('post','postlinks','next','previous'));
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
		  $post = Post::find($id);
		  //dd($project);

		  $comment = new Comment();
				// $comment->name = $request->name;
				// $comment->email = $request->email;
				$comment->user_id = Auth::user()->id;
				$comment->comment = $request->comment;
			$post->comments()->save($comment);
		  //$comment->save();

		  // Save entry to log file using built-in Monolog
		  // if (Auth::check()) {
		  //     Log::info(Auth::user()->username . " (" . Auth::user()->id . ") commented on post (" . $post->id . ")\r\n", [json_decode($comment, true)]);
		  // } else {
		  //     Log::info(Request::ip() . " commented on post " . $post->id);
		  // }

		  Session::flash('success', 'Comment added succesfully.');
		  return redirect()->route('blog.single', [$post->slug]);
	 }


}