<?php

namespace App\Http\Controllers;

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

use App\Http\Requests\CreateAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;

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
#  ██████╗██████╗ ███████╗ █████╗ ████████╗███████╗
# ██╔════╝██╔══██╗██╔════╝██╔══██╗╚══██╔══╝██╔════╝
# ██║     ██████╔╝█████╗  ███████║   ██║   █████╗  
# ██║     ██╔══██╗██╔══╝  ██╔══██║   ██║   ██╔══╝  
# ╚██████╗██║  ██║███████╗██║  ██║   ██║   ███████╗
#  ╚═════╝╚═╝  ╚═╝╚══════╝╚═╝  ╚═╝   ╚═╝   ╚══════╝
// Show the form for creating a new resource
##################################################################################################################
   public function create() {
      return view('albums.create');
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
      return redirect()->route('albums.index');
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
      if(!checkACL('author')) {
         return view('errors.403');
      }

      // Find the article to edit
      $album = Album::findOrFail($id);

      // find all categories in the categories table and pass them to the view
      //$categories = Category::whereHas('module', function ($query) {
      //   $query->where('name', '=', 'articles');
      //})->get();

      // Create an empty array to store the categories
      //$cats = [];
      // Store the category values into the $cats array
      //foreach ($categories as $category) {
      //   $cats[$category->id] = $category->name;
      // }

      return view('albums.edit', compact('album'));
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
      $albums = Album::with('Photos')->paginate(8);
      //return view('backend.albums.index')->with('albums', $albums);
      return view('albums.index', compact('albums'));
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
         return view('albums.newAlbums', compact('albums','letters'));
      }

      // $albums = Album::with('photos','category')->newAlbums()->get();
      $albums = Album::with('photos')->newAlbums()->get();
      return view('albums.newAlbums', compact('albums','letters'));
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
      return view('albums.show', compact('album'));
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
   // public function store(Request $request) {
   public function store(CreateAlbumRequest $request) {
      
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
      return redirect()->route('albums.index');
      

      // if ($request->get('action') == 'save') {
      //    // Just save the record
      //    return back()->withInput();
      //    //redirect(App\Request::url());
      // } elseif ($request->get('action') == 'save_and_close') {
      //    // Save the record, and redirect to index
      //    return redirect()->route('albums.index');
      // } elseif ($request->get('action') == 'save_and_new') {
      //    // Save the record, and redirect to create
      //    return redirect()->route('albums.create');
      // }
     
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
   public function update(UpdateAlbumRequest $request, $id)
   {

      if($request->file('cover_image')) {
         $album = Album::find($id);
         // Delete the project cover image and it's thumbnail
         unlink(public_path('_albums/cover_images/' . $album->cover_image));
         unlink(public_path('_albums/cover_images/thumbs/' . $album->cover_image));

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
      }

      $album = Album::findOrFail($id);
         $album->name             = $request->name;
         $album->description      = $request->description;
         if ($request->file('cover_image')) {
            $album->cover_image   = $filenameToStore;
         }
      $album->save();
      
      // Save entry to log file using built-in Monolog
      //Log::info(Auth::user()->username . " (" . Auth::user()->id . ") UPDATED article (" . $article->id . ")\r\n",
      //    [json_decode($article, true)]
      //);

      Session::flash('success','The album has been updated successfully.');
      return redirect()->route('albums.show', $album);
   }











##################################################################################################################
#  █████╗ ██████╗ ██████╗     ██████╗ ██╗  ██╗ ██████╗ ████████╗ ██████╗ 
# ██╔══██╗██╔══██╗██╔══██╗    ██╔══██╗██║  ██║██╔═══██╗╚══██╔══╝██╔═══██╗
# ███████║██║  ██║██║  ██║    ██████╔╝███████║██║   ██║   ██║   ██║   ██║
# ██╔══██║██║  ██║██║  ██║    ██╔═══╝ ██╔══██║██║   ██║   ██║   ██║   ██║
# ██║  ██║██████╔╝██████╔╝    ██║     ██║  ██║╚██████╔╝   ██║   ╚██████╔╝
# ╚═╝  ╚═╝╚═════╝ ╚═════╝     ╚═╝     ╚═╝  ╚═╝ ╚═════╝    ╚═╝    ╚═════╝ 
// Show the form for creating a new resource
##################################################################################################################
   public function addPhoto($album_id) {
      return view('albums.photos.create', compact('album_id'));
   }


##################################################################################################################
# ██████╗  ██████╗ ██╗    ██╗███╗   ██╗██╗      ██████╗  █████╗ ██████╗ 
# ██╔══██╗██╔═══██╗██║    ██║████╗  ██║██║     ██╔═══██╗██╔══██╗██╔══██╗
# ██║  ██║██║   ██║██║ █╗ ██║██╔██╗ ██║██║     ██║   ██║███████║██║  ██║
# ██║  ██║██║   ██║██║███╗██║██║╚██╗██║██║     ██║   ██║██╔══██║██║  ██║
# ██████╔╝╚██████╔╝╚███╔███╔╝██║ ╚████║███████╗╚██████╔╝██║  ██║██████╔╝
# ╚═════╝  ╚═════╝  ╚══╝╚══╝ ╚═╝  ╚═══╝╚══════╝ ╚═════╝ ╚═╝  ╚═╝╚═════╝
// Download the specified resource to the local machine -> bypass save as dialog
##################################################################################################################
   public function download($pathToFile) {
      return response()->download($pathToFile);   
   }


##################################################################################################################
# ███████╗██╗  ██╗ ██████╗ ██╗    ██╗    ██████╗ ██╗  ██╗ ██████╗ ████████╗ ██████╗ 
# ██╔════╝██║  ██║██╔═══██╗██║    ██║    ██╔══██╗██║  ██║██╔═══██╗╚══██╔══╝██╔═══██╗
# ███████╗███████║██║   ██║██║ █╗ ██║    ██████╔╝███████║██║   ██║   ██║   ██║   ██║
# ╚════██║██╔══██║██║   ██║██║███╗██║    ██╔═══╝ ██╔══██║██║   ██║   ██║   ██║   ██║
# ███████║██║  ██║╚██████╔╝╚███╔███╔╝    ██║     ██║  ██║╚██████╔╝   ██║   ╚██████╔╝
# ╚══════╝╚═╝  ╚═╝ ╚═════╝  ╚══╝╚══╝     ╚═╝     ╚═╝  ╚═╝ ╚═════╝    ╚═╝    ╚═════╝
// Display the specified resource
##################################################################################################################
   public function showPhoto($id) {
      $photo = Photo::find($id);
      return view('albums.photos.show', compact('photo'));
   }


##################################################################################################################
# ███████╗████████╗ ██████╗ ██████╗ ███████╗    ██████╗ ██╗  ██╗ ██████╗ ████████╗ ██████╗ 
# ██╔════╝╚══██╔══╝██╔═══██╗██╔══██╗██╔════╝    ██╔══██╗██║  ██║██╔═══██╗╚══██╔══╝██╔═══██╗
# ███████╗   ██║   ██║   ██║██████╔╝█████╗      ██████╔╝███████║██║   ██║   ██║   ██║   ██║
# ╚════██║   ██║   ██║   ██║██╔══██╗██╔══╝      ██╔═══╝ ██╔══██║██║   ██║   ██║   ██║   ██║
# ███████║   ██║   ╚██████╔╝██║  ██║███████╗    ██║     ██║  ██║╚██████╔╝   ██║   ╚██████╔╝
# ╚══════╝   ╚═╝    ╚═════╝ ╚═╝  ╚═╝╚══════╝    ╚═╝     ╚═╝  ╚═╝ ╚═════╝    ╚═╝    ╚═════╝ 
// Store a newly created resource in storage
##################################################################################################################
   public function storePhoto(Request $request) {
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
      return redirect('/albums/'. $request->input('album_id'));
   }


##################################################################################################################
# ██████╗ ███████╗██╗     ███████╗████████╗███████╗    ██████╗ ██╗  ██╗ ██████╗ ████████╗ ██████╗ 
# ██╔══██╗██╔════╝██║     ██╔════╝╚══██╔══╝██╔════╝    ██╔══██╗██║  ██║██╔═══██╗╚══██╔══╝██╔═══██╗
# ██║  ██║█████╗  ██║     █████╗     ██║   █████╗      ██████╔╝███████║██║   ██║   ██║   ██║   ██║
# ██║  ██║██╔══╝  ██║     ██╔══╝     ██║   ██╔══╝      ██╔═══╝ ██╔══██║██║   ██║   ██║   ██║   ██║
# ██████╔╝███████╗███████╗███████╗   ██║   ███████╗    ██║     ██║  ██║╚██████╔╝   ██║   ╚██████╔╝
# ╚═════╝ ╚══════╝╚══════╝╚══════╝   ╚═╝   ╚══════╝    ╚═╝     ╚═╝  ╚═╝ ╚═════╝    ╚═╝    ╚═════╝   
// Remove the specified resource from storage
// ???? Used in the index page and trashAll action to soft delete multiple records
##################################################################################################################
   public function destroyPhoto($id) {
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
      return redirect(route('albums.show', $photo->album_id));
   }




}
