<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Album;
use App\Photo;
use Session;
use Image;
use File;
use DB;
use Auth;

class AlbumsController extends Controller
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
		// $this->middleware('auth');
      $this->middleware('auth', ['except'=>['index', 'show']]);

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
	public function index() {
		$albums = Album::with('Photos')->get();
		//return view('backend.albums.index')->with('albums', $albums);
		return view('backend.albums.index', compact('albums'));
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
	public function create() {
		return view('backend.albums.create');
	}


##################################################################################################################
# ███╗   ██╗███████╗██╗    ██╗     █████╗ ██╗     ██████╗ ██╗   ██╗███╗   ███╗███████╗
# ████╗  ██║██╔════╝██║    ██║    ██╔══██╗██║     ██╔══██╗██║   ██║████╗ ████║██╔════╝
# ██╔██╗ ██║█████╗  ██║ █╗ ██║    ███████║██║     ██████╔╝██║   ██║██╔████╔██║███████╗
# ██║╚██╗██║██╔══╝  ██║███╗██║    ██╔══██║██║     ██╔══██╗██║   ██║██║╚██╔╝██║╚════██║
# ██║ ╚████║███████╗╚███╔███╔╝    ██║  ██║███████╗██████╔╝╚██████╔╝██║ ╚═╝ ██║███████║
# ╚═╝  ╚═══╝╚══════╝ ╚══╝╚══╝     ╚═╝  ╚═╝╚══════╝╚═════╝  ╚═════╝ ╚═╝     ╚═╝╚══════╝
// Display a listing of the resource that were created since the user's last login.
##################################################################################################################
   public function newAlbums(Request $request, $key=null)
   {
      // if(!checkACL('guest')) {
      //     return view('errors.403');
      // }

      //$alphas = range('A', 'Z');
      $alphas = DB::table('albums')
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
         // $albums = Album::with('photos','category')->newAlbums()
         $albums = Album::with('photos')->newAlbums()
            ->where('title', 'like', $key . '%')
            ->get();
         return view('backend.albums.newAlbums', compact('albums','letters'));
      }

      // $albums = Album::with('photos','category')->newAlbums()->get();
      $albums = Album::with('photos')->newAlbums()->get();
      return view('backend.albums.newAlbums', compact('albums','letters'));
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
	public function store(Request $request) {
		
		$this->validate($request, [
			'name' => 'required',
			'description' => 'required',
			'cover_image' => 'required|image|max:1999'
		]);


		// Get the file object
		$file = $request->file('cover_image');

		// Get file name with extension
		$filenameWithExt = $request->file('cover_image')->getClientOriginalName();

		// Get just the filename
		$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

		// Get the extension
		$extension = $request->file('cover_image')->getClientOriginalExtension();

		// Create the new filename
		$filenameToStore = $filename . '_' . time() . '.' . $extension;
		//return $filenameToStore;
		
		// Check if Gallery/Images folders exists
		if (!file_exists('_albums/cover_images')) {
			mkdir('_albums/cover_images', 0777, true);
		}

		// move the file to the correct location
		$file->move('_albums/cover_images', $filenameToStore);
		
		// Check if Thumbs folder exists under Images
		if (!file_exists('_albums/cover_images/thumbs')) {
			mkdir('_albums/cover_images/thumbs', 0777, true);
		}

		// Create thumbnail
		$thumb = Image::make('_albums/cover_images/' . $filenameToStore)
			->resize(240,160)
			->save('_albums/cover_images/thumbs/' . $filenameToStore, 60);

		//Create album
		$album = new Album;
			$album->name = $request->input('name');
			$album->description = $request->input('description');
			$album->cover_image = $filenameToStore;
		$album->save();

		Session::flash('success','Album created.');
		return redirect()->route('backend.albums.index');
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
		$album = Album::with('Photos')->find($id);
		return view('backend.albums.show', compact('album'));
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
		
		$album = Album::find($id);
		//dd($album);
		foreach($album->photos as $photo) {
			unlink(public_path('_albums/images/' . $album->id . "/" . $photo->new_name));
			unlink(public_path('_albums/images/thumbs/' . $album->id . "/" . $photo->new_name));
			//Delete the photos of this album from the database
			$photo->delete();
		}

		// Delete the album cover image and it's thumbnail
		unlink(public_path('_albums/cover_images/' . $album->cover_image));
		unlink(public_path('_albums/cover_images/thumbs/' . $album->cover_image));
		
		// Delete the IMAGES/THUMBS folder matching the album id
		File::deleteDirectory(public_path('_albums/images/thumbs/' . $album->id));
		// Delete the IMAGES folder matching the album id
		File::deleteDirectory(public_path('_albums/images/' . $album->id));

		//Delete the album from the database
		$album->delete();

		Session::flash('success','Album and images deleted.');
		return redirect()->route('backend.albums.index');
	}


}
