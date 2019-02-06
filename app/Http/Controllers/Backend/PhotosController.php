<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Photo;
use Session;
use Image;
use File;

class PhotosController extends Controller
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
		$this->middleware('auth');

		//Log::useFiles(storage_path().'/logs/articles.log');
		//Log::useFiles(storage_path().'/logs/audits.log');
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
	public function create($album_id) {
		return view('backend.photos.create', compact('album_id'));
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
			'ori_name' => 'required',
			'new_name' => 'image|max:1999'
		]);

		// Get the file object
		$file = $request->file('photo');

		// Get file name with extension
		$filenameWithExt = $request->file('photo')->getClientOriginalName();

		// Get just the filename
		$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

		// Get the extension
		$extension = $request->file('photo')->getClientOriginalExtension();

		// Create the new filename
		$filenameToStore = $filename . '_' . time() . '.' . $extension;
		//dd($filenameToStore);
		// Upload image
		// Check if Gallery/Images folders exists
		if (!file_exists('_albums/images/'.$request->input('album_id'))) {
			mkdir('_albums/images/' . $request->input('album_id'), 0777, true);
		}

		// move the file to the correct location
		$file->move('_albums/images/' . $request->input('album_id') . "/", $filenameToStore);
		
		// Check if Thumbs folder exists under Images
		if (!file_exists('_albums/images/thumbs/'.$request->input('album_id'))) {
			mkdir('_albums/images/thumbs/' . $request->input('album_id'), 0777, true);
		}

		// Create thumbnail
		$thumb = Image::make('_albums/images/' . $request->input('album_id') . "/" . $filenameToStore)
			->resize(240,160)
			->save('_albums/images/thumbs/' . $request->input('album_id') . "/" . $filenameToStore, 60);


		//Create photo record in DB
		$photo = new Photo;
			$photo->album_id = $request->input('album_id');
			$photo->ori_name = $request->input('ori_name');
			$photo->new_name = $filenameToStore;            
			$photo->size = $request->file('photo')->getClientSize();
			$photo->description = $request->input('description');
		$photo->save();

		Session::flash('success','Photo uploaded.');
		return redirect('/backend/albums/'. $request->input('album_id'));
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
		$photo = Photo::find($id);
		return view('backend.photos.show', compact('photo'));
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
		$photo = Photo::find($id);

		unlink(public_path('_albums/images/' . $photo->album->id . "/" . $photo->new_name));
		unlink(public_path('_albums/images/thumbs/' . $photo->album->id . "/" . $photo->new_name));
		$photo->delete();

		// Check if there are any files left in the folder, if not, delete the folder and thumbs folder
		if (count(glob('_albums/images/' . $photo->album->id . "/*")) === 0 ) { // empty
			// Delete the IMAGES/THUMBS folder matching the album id
			File::deleteDirectory(public_path('_albums/images/thumbs/' . $photo->album_id));
			// Delete the IMAGES folder matching the album id
			File::deleteDirectory(public_path('_albums/images/' . $photo->album_id));
		}
		
		Session::flash('success','Image deleted.');
		return redirect(route('backend.albums.show', $photo->album_id));
	}


}
