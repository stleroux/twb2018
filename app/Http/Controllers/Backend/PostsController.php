<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//use App\Http\Requests;
use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Auth;
use DB;
use File;
use Image;
use Purifier;
use Session;
use Storage;
use Log;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostsController extends Controller
{

    public function __construct() {
        // only allow authenticated users to access these pages
        $this->middleware('auth');

        //Log::useFiles(storage_path().'/logs/posts.log');
    }
    
    //==================================================================================================================================
    // NOTES
    //
    //==================================================================================================================================
        // section_name('XXX')   // Always lowercase and always plural
        // action_name('XXX')    // Name of the action being performed

    //==================================================================================================================================
    // Display a list of resources
    //==================================================================================================================================
    public function index(Request $request, $key=null)
    {
        // if(!checkACL('author')) {
        //     return view('errors.403');
        // }

        //$alphas = range('A', 'Z');
        $alphas = DB::table('posts')
            ->select(DB::raw('DISTINCT LEFT(title, 1) as letter'))
            //->where('published_at','<', Carbon::Now())
            //->where('deleted_at','=', Null)
            ->orderBy('letter')
            ->get();

        $letters = [];
        foreach($alphas as $alpha) {
          $letters[] = $alpha->letter;
        }

        // If $key value is passed
        if ($key) {
            $posts = Post::where('title', 'like', $key . '%')
                ->orderBy('title', 'asc')
                ->get();
            return view('backend.posts.index', compact('posts','letters'));
        }

        // No $key value is passed
        $posts = Post::all();
        return view('backend.posts.index', compact('posts','letters'));
    }

    //==================================================================================================================================
    // Show the form for creating a new resource
    //==================================================================================================================================
    public function create()
    {
        if(!checkACL('author')) {
            return view('errors.403');
        }

        // find all categories in the categories table and pass them to the view
        $categories = Category::whereHas('module', function ($query) {
            $query->where('name', 'like', 'posts');
        })->get();

        // Create an empty array to store the categories
        $cats = [];
        // Store the category values into the $cats array
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }

        $tags = Tag::all();

        return view ('backend.posts.create')->withCategories($cats)->withTags($tags);
    }

    //==================================================================================================================================
    // Store a newly created resource in storage
    //==================================================================================================================================
    public function store(CreatePostRequest $request)
    {
        // save the data in the database
        $post = new Post;

            $post->title = $request->title;
            $post->slug = $request->slug;
            $post->category_id = $request->category_id;
            // $post->body = $request->body;
            $post->body = Purifier::clean($request->body);
            $post->user_id = Auth::user()->id;
            $post->modified_by_id = Auth::user()->id;

            // Save the image if there is one
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('_posts/' . $filename);
                Image::make($image)->resize(800, 400)->save($location);

                $post->image = $filename;
            }

        $post->save();

        // save the tags in the post_tag table
        // false required as default (otherwise override existing association)
        //$post->tags()->sync($request->tags, false);
        if (isset($request->tags))
        {
            $post->tags()->sync($request->tags, false);
        } else {
            $post->tags()->sync(array());
        }

        // Save entry to log file using built-in Monolog
        Log::info(Auth::user()->username . " (" . Auth::user()->id . ") CREATED post (" . $post->id . ")\r\n", 
            [json_decode($post, true)]
        );

        // set a flash message to be displayed on screen
            Session::flash('success','The post was successfully saved!');

        // redirect to another page
           return redirect()->route('backend.posts.show', $post->id);
    }

    //==================================================================================================================================
    // Display the specified resource
    //==================================================================================================================================
    public function show($id)
    {
        $post = Post::find($id);

        // Add 1 to views column
        DB::table('posts')->where('id','=',$post->id)->increment('views',1);

        // find all categories in the categories table and pass them to the view
        $categories = Category::whereHas('module', function ($query) {
            $query->where('name', 'like', 'posts');
        })->get();

        // Create an empty array to store the categories
        $cats = [];
        // Store the category values into the $cats array
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }

        $tags = Tag::all();

        return view ('backend.posts.show')
            ->withPost($post)
            ->withTags($tags)
            ->withCategories($cats);
    }

    //==================================================================================================================================
    // Show the form for editing the specified resource
    //==================================================================================================================================
    public function edit($id)
    {
        if(!checkACL('author')) {
            return view('errors.403');
        }

        // find the post in the db and save it to a variable
        $post = Post::find($id);
        
        // find the categories
        $categories = Category::whereHas('module', function ($query) {
            $query->where('name', '=', 'posts');
        })->get();

        // Create an empty array to store the categories
        $cats = [];
        // Store the category values into the $cats array
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }

        // find the associated tags
        $tags = Tag::all();
        // Create an empty array to store the tags
        $tags2 = [];
        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }

        return view ('backend.posts.edit')
            ->withPost($post)  
            ->withCategories($cats)
            ->withTags($tags2);
    }

    //==================================================================================================================================
    // Update the specified resource in storage
    //==================================================================================================================================
    public function update(UpdatePostRequest $request, $id)
    {
        if(!checkACL('author')) {
            return view('errors.403');
        }

        // Get the post values from the database
        $post = Post::find($id);

            // Save the data to the database
            $post->title = $request->input('title');
            $post->slug = $request->input('slug');
            $post->category_id = $request->input('category_id');
            $post->body = Purifier::clean($request->input('body'));
            $post->modified_by_id = Auth::user()->id;

            // Check if a new image was submitted
            if ($request->hasFile('image')) {
                //Add new photo
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('_posts/' . $filename);
                Image::make($image)->resize(800, 400)->save($location);
                
                // get name of old image
                $oldImageName = $post->image;

                // Update database
                $post->image = $filename;

                // Delete old photo
                File::delete('_posts/' . $oldImageName);
            }

        $post->save();

        //save the tags in the databse
        // not adding 2nd param will delete all entries in array and replace them with new ones
        // check that there is something in the array and then save it else pass an empty array
        if (isset($request->tags))
        {
            $post->tags()->sync($request->tags);
        } else {
            $post->tags()->sync(array());
        }

        // Save entry to log file using built-in Monolog
        // Log::info(Auth::user()->username . " (" . Auth::user()->id . ") UPDATED post (" . $post->id . ")\r\n", 
        //    [json_decode($post, true)]
        // );

        // Set flash data with success message
        Session::flash ('success', 'This post was successfully updated!');

        // Redirect to posts.show
        return redirect()->route('backend.posts.index');
    }

    // public function delete($id)
    // {
    //     $post = Post::find($id);
    //     //$createdBy = User::find($post->user_id);
    //     //$modifiedBy = User::find($post->modified_by);
    //     return view('posts.delete')
    //         ->withPost($post);
    //         //->withCreatedby($createdBy)
    //         //->withModifiedby($modifiedBy);
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);
        
        // remove any references to this post from the post_tag table
        $post->tags()->detach();

        // Delete the associated image if any
        //Storage::delete($post->image_path);
        $post->delete();
        File::delete('_posts/' . $post->image_path);

        // Save entry to log file using built-in Monolog
        Log::info(Auth::user()->username . " (" . Auth::user()->id . ") DELETED post (" . $post->id . ")\r\n", 
            [json_decode($post, true)]
        );

        Session::flash('success', 'The post was successfully deleted!');
        return redirect()->route('backend.posts.index');
    }

  //==================================================================================================================================
  // PRINT POST
  //==================================================================================================================================
  public function printPost($id)
  {
    $post = Post::find($id);

    // Save entry to log file using built-in Monolog
    Log::info(Auth::user()->username . " (" . Auth::user()->id . ") PRINTED post (" . $post->id . ")\r\n", [json_decode($post, true)]);

    return view('backend.posts.print')->withPost($post);
  }

    public function viewImage($id)
    {
        $post = Post::find($id);
        
        return view('backend.posts.viewImage')->withPost($post);
    }

    public function deleteImage($id)
    {
        // Find the user
        $post = Post::find($id);

        // Delete the image from the system
        File::delete('_posts/' . $post->image);
        
        // Update database
        $post->image = NULL;
        $post->save();
        
        // Set flash data with success message
        Session::flash ('success', 'The post\'s image was successfully removed!');

        // Send the user back to the Show page
        //$modifiedBy = User::find($recipe->modified_by);
        //$lastViewedBy = User::find($recipe->last_viewed_by);

        //$createdBy = User::find($post->user_id);
        //$modifiedBy = User::find($post->modified_by);
        return view ('backend.posts.show')->withPost($post);
    }

    public function showUser($id)
    {
        $user = User::find($id);
        return view('backend.posts.showUser')->withUser($user);
    }


##################################################################################################################
# ███╗   ██╗███████╗██╗    ██╗    ██████╗  ██████╗ ███████╗████████╗███████╗
# ████╗  ██║██╔════╝██║    ██║    ██╔══██╗██╔═══██╗██╔════╝╚══██╔══╝██╔════╝
# ██╔██╗ ██║█████╗  ██║ █╗ ██║    ██████╔╝██║   ██║███████╗   ██║   ███████╗
# ██║╚██╗██║██╔══╝  ██║███╗██║    ██╔═══╝ ██║   ██║╚════██║   ██║   ╚════██║
# ██║ ╚████║███████╗╚███╔███╔╝    ██║     ╚██████╔╝███████║   ██║   ███████║
# ╚═╝  ╚═══╝╚══════╝ ╚══╝╚══╝     ╚═╝      ╚═════╝ ╚══════╝   ╚═╝   ╚══════╝
// Display a listing of the resource that were created since the user's last login.
##################################################################################################################
   public function newPosts(Request $request, $key=null)
   {
      // if(!checkACL('guest')) {
      //     return view('errors.403');
      // }

      //$alphas = range('A', 'Z');
      $alphas = DB::table('posts')
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
         $posts = Post::with('user','category')->newPosts()
            ->where('title', 'like', $key . '%')
            ->get();
         return view('backend.posts.newPosts', compact('posts','letters'));
      }

      $posts = Post::with('user','category')->newPosts()->get();
      return view('backend.posts.newPosts', compact('posts','letters'));
   }
}
