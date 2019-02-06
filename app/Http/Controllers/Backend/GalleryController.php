<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gallery;
use Auth;
use Session;
use Validator;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
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
	public function viewGalleryList()
	{
		$galleries = Gallery::All();
		return view('backend.galleries.index', compact('galleries'));
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
	public function saveGallery(Request $request)
	{
		// Validate the request thorugh the validation rules
		$validator = Validator::make($request->all(), [
			'gallery_name' => 'required|min:5'
		]);

		// Validation fails
		if ($validator->fails()) {
			return redirect('backend.gallery.list')
				->withErrors($validator)
				->withInput();
		}

		$gallery = new Gallery;
			$gallery->name = $request->input('gallery_name');
			$gallery->created_by = Auth::user()->id;
			$gallery->published = 1;
		$gallery->save();

		return redirect()->back();
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
	public function editGallery($id)
	{
		$gallery = Gallery::find($id);

		return view('backend.galleries.edit', compact('gallery'));
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
	// public function updateGallery(UpdateGalleryRequest $request, $id)
	public function updateGallery(Request $request, $id)
	{
		
		// if(!checkACL('author')) {
		//     return view('errors.403');
		// }

		//dd($request->ref);

		$gallery = Gallery::findOrFail($id);
			$gallery->name = $request->name;
		$gallery->save();
		
		// Save entry to log file using built-in Monolog
		//Log::info(Auth::user()->username . " (" . Auth::user()->id . ") UPDATED article (" . $article->id . ")\r\n",
		//    [json_decode($article, true)]
		//);

		Session::flash('success','The gallery has been updated successfully.');
		return redirect()->route('backend.gallery.list');
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
	public function viewGalleryPics($id)
	{
		$gallery = Gallery::findOrFail($id);

		return view('backend.galleries.show', compact('gallery'));
	}


##################################################################################################################
# ██╗███╗   ███╗ █████╗  ██████╗ ███████╗    ██╗   ██╗██████╗ ██╗      ██████╗  █████╗ ██████╗ 
# ██║████╗ ████║██╔══██╗██╔════╝ ██╔════╝    ██║   ██║██╔══██╗██║     ██╔═══██╗██╔══██╗██╔══██╗
# ██║██╔████╔██║███████║██║  ███╗█████╗      ██║   ██║██████╔╝██║     ██║   ██║███████║██║  ██║
# ██║██║╚██╔╝██║██╔══██║██║   ██║██╔══╝      ██║   ██║██╔═══╝ ██║     ██║   ██║██╔══██║██║  ██║
# ██║██║ ╚═╝ ██║██║  ██║╚██████╔╝███████╗    ╚██████╔╝██║     ███████╗╚██████╔╝██║  ██║██████╔╝
# ╚═╝╚═╝     ╚═╝╚═╝  ╚═╝ ╚═════╝ ╚══════╝     ╚═════╝ ╚═╝     ╚══════╝ ╚═════╝ ╚═╝  ╚═╝╚═════╝ 
##################################################################################################################
	public function doImageUpload(Request $request)
	{
		// get the file from the post request
		$file = $request->file('file');

		// set filename
		$filename = uniqid() . $file->getClientOriginalName();

		// Check if Gallery/Images folders exists
		if (!file_exists('_gallery/images')) {
			mkdir('_gallery/images', 0777, true);
		}

		// move the file to the correct location
		$file->move('_gallery/images', $filename);

		// Check if Thumbs folder exists under Images
		if (!file_exists('_gallery/images/thumbs')) {
			mkdir('_gallery/images/thumbs', 0777, true);
		}

		// Create thumbnail
		$thumb = Image::make('_gallery/images/' . $filename)->resize(240,160)->save('_gallery/images/thumbs/' . $filename, 60);

		// save image details in database
		$gallery = Gallery::find($request->input('gallery_id'));
		$image = $gallery->images()->create([
			'gallery_id' => $request->input('gallery_id'),
			'file_name' => $filename,
			'file_size' => $file->getClientSize(),
			'file_mime' => $file->getClientMimeType(),
			'file_path' => '_gallery/images/' . $filename,
			'created_by' => Auth::user()->id,
		]);

		return $image;
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
	public function deleteGallery($id)
	{
		// Load the gallery
		$currentGallery = Gallery::findOrFail($id);

		// check owenership
		if($currentGallery->created_by != Auth::user()->id) {
			abort('403', 'You are not allowed to delete this gallery!');
		}

		// get the images
		$images = $currentGallery->images();

		// delete the images
		foreach($currentGallery->images as $image) {
			unlink(public_path($image->file_path));
			unlink(public_path('_gallery/images/thumbs/' . $image->file_name));
		}

		// Delete all image rows from the table
		$images->delete();

		// Delete the gallery
		$currentGallery->delete();

		return redirect()->back();
	}

}
