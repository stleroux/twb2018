<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Hash;
use Auth;
use Session;
use App\Profile;
use App\User;
use App\Category;
use Image;
use File;

class ProfileController extends Controller
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
		$this->middleware('auth');
	}


##################################################################################################################
#  ██████╗██╗  ██╗ █████╗ ███╗   ██╗ ██████╗ ███████╗    ██████╗ ██╗    ██╗██████╗ 
# ██╔════╝██║  ██║██╔══██╗████╗  ██║██╔════╝ ██╔════╝    ██╔══██╗██║    ██║██╔══██╗
# ██║     ███████║███████║██╔██╗ ██║██║  ███╗█████╗      ██████╔╝██║ █╗ ██║██║  ██║
# ██║     ██╔══██║██╔══██║██║╚██╗██║██║   ██║██╔══╝      ██╔═══╝ ██║███╗██║██║  ██║
# ╚██████╗██║  ██║██║  ██║██║ ╚████║╚██████╔╝███████╗    ██║     ╚███╔███╔╝██████╔╝
#  ╚═════╝╚═╝  ╚═╝╚═╝  ╚═╝╚═╝  ╚═══╝ ╚═════╝ ╚══════╝    ╚═╝      ╚══╝╚══╝ ╚═════╝ 
##################################################################################################################
	public function changePassword(Request $request){
	
		if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
		// The current password does not match the one provided
		return redirect()->back()->with("error","Your current password does not match the password you provided. Please try again.")->withInput(['tab'=>'changePwd']);
		}

		if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
		// Current password and new password are the same
		return redirect()->back()->with("error","The new password cannot be the same as your current password. Please choose a different password.")->withInput(['tab'=>'changePwd']);
		}

		$validatedData = $request->validate([
		'current-password' => 'required',
		'new-password' => 'required|string|min:6|confirmed',
		]);

		//Change Password
		$user = Auth::user();
			$user->password = bcrypt($request->get('new-password'));
		$user->save();
		
		return redirect()->back()->with("success","Password changed successfully!")->withInput(['tab'=>'changePwd']);
	}


##################################################################################################################
# ██████╗ ███████╗██╗     ███████╗████████╗███████╗    ██╗███╗   ███╗ █████╗  ██████╗ ███████╗
# ██╔══██╗██╔════╝██║     ██╔════╝╚══██╔══╝██╔════╝    ██║████╗ ████║██╔══██╗██╔════╝ ██╔════╝
# ██║  ██║█████╗  ██║     █████╗     ██║   █████╗      ██║██╔████╔██║███████║██║  ███╗█████╗  
# ██║  ██║██╔══╝  ██║     ██╔══╝     ██║   ██╔══╝      ██║██║╚██╔╝██║██╔══██║██║   ██║██╔══╝  
# ██████╔╝███████╗███████╗███████╗   ██║   ███████╗    ██║██║ ╚═╝ ██║██║  ██║╚██████╔╝███████╗
# ╚═════╝ ╚══════╝╚══════╝╚══════╝   ╚═╝   ╚══════╝    ╚═╝╚═╝     ╚═╝╚═╝  ╚═╝ ╚═════╝ ╚══════╝
##################################################################################################################
	public function deleteImage($id)
	{
		// Find the user
		$profile = Profile::find($id);

		// Delete the image from the system
		File::delete('_profiles/' . $profile->image);
		
		// Update database
		$profile->image = NULL;
		$profile->save();

		// Set flash data with success message and return user to same tab
		Session::flash ('success', 'Your profile image was successfully removed!');
		return redirect()->route('backend.profile', $id)->withInput(['tab'=>'profile']);
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
	public function index($id)
	{
		// Find the logged in user
		$user = User::with('profile')->findOrFail(Auth::user()->id);
		//dd($user);

		// find all projects categories in the categories table and pass them to the view
		if(checkACL('manager')) {
			$landingpages = Category::whereHas('module', function ($query) {
				$query
					->where('name', '=', 'landing pages');
			})->orderBy('name','asc')->get();
		} else {
			$landingpages = Category::whereHas('module', function ($query) {
				$query
					->where('name', '=', 'landing pages')
					->where('value', 'NOT LIKE', '%(BE)%')
				;
			})->orderBy('name','asc')->get();
		}

		// Create an empty array to store the categories
		$landingPages = [];

		// Store the category values into the $cats array
		foreach ($landingpages as $landingPage) {
			$landingPages[$landingPage->id] = ucfirst($landingPage->value);
		}

		return view('backend.profiles.index', compact('user'))->withLandingPages($landingPages);
	}


##################################################################################################################
# ██████╗ ███████╗███████╗███████╗████████╗    ███████╗███████╗████████╗████████╗██╗███╗   ██╗ ██████╗ ███████╗
# ██╔══██╗██╔════╝██╔════╝██╔════╝╚══██╔══╝    ██╔════╝██╔════╝╚══██╔══╝╚══██╔══╝██║████╗  ██║██╔════╝ ██╔════╝
# ██████╔╝█████╗  ███████╗█████╗     ██║       ███████╗█████╗     ██║      ██║   ██║██╔██╗ ██║██║  ███╗███████╗
# ██╔══██╗██╔══╝  ╚════██║██╔══╝     ██║       ╚════██║██╔══╝     ██║      ██║   ██║██║╚██╗██║██║   ██║╚════██║
# ██║  ██║███████╗███████║███████╗   ██║       ███████║███████╗   ██║      ██║   ██║██║ ╚████║╚██████╔╝███████║
# ╚═╝  ╚═╝╚══════╝╚══════╝╚══════╝   ╚═╝       ╚══════╝╚══════╝   ╚═╝      ╚═╝   ╚═╝╚═╝  ╚═══╝ ╚═════╝ ╚══════╝
##################################################################################################################
	public function resetSettings(Request $request, $id)
	{
		//dd($id);
		$profile = Profile::findOrFail($id);
		//dd($profile);
			$profile->frontendStyle = 'slate';
			$profile->backendStyle = 'bootstrap';
			$profile->author_format = 1;
			$profile->alert_fade_time = 5000;
			$profile->date_format = 1;
			$profile->landing_page_id = 41;
			$profile->rows_per_page = 15;
			$profile->display_size = 'normal';
			$profile->action_buttons = 1;
			$profile->layout = 1;
		$profile->save();
		
		// Save entry to log file using built-in Monolog
		//Log::info(Auth::user()->username . " (" . Auth::user()->id . ") UPDATED article (" . $article->id . ")\r\n",
		//    [json_decode($article, true)]
		//);

		Session::flash('success','Your preferences have been reset to their default values successfully.');
		return redirect()->route('backend.profile', $id)->withInput(['tab'=>'settings']);
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
	public function show($id)
	{
		$user = User::findOrFail($id);
		//dd($user);
		return view('backend.profiles.show', compact('user'));
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
	public function update(Request $request, $id)
	{

		$profile = Profile::findOrFail($id);

			$profile->first_name = $request->first_name;
			$profile->last_name = $request->last_name;
			$profile->telephone = $request->telephone;
			//$profile->image = $request->image;

			// Check if a new image was submitted
			if ($request->hasFile('image')) {
				//Add new photo
				$image = $request->file('image');
				$filename = time() . '.' . $image->getClientOriginalExtension();
				//dd($filename);
				$location = public_path('_profiles/' . $filename);
				Image::make($image)->resize(800, 400)->save($location);
				
				// get name of old image
				$oldImageName = $profile->image;

				// Update database
				$profile->image = $filename;

				// Delete old photo
				//Storage::delete($oldImageName);
				File::delete('_profiles/' . $oldImageName);
			}
		$profile->save();
		
		// Save entry to log file using built-in Monolog
		//Log::info(Auth::user()->username . " (" . Auth::user()->id . ") UPDATED article (" . $article->id . ")\r\n",
		//    [json_decode($article, true)]
		//);

		Session::flash('success','Your profile has been updated successfully.');
		return redirect()->route('backend.profile', $profile->id)->withInput(['tab'=>'profile']);
	}


##################################################################################################################
# ██╗   ██╗██████╗ ██████╗  █████╗ ████████╗███████╗     █████╗  ██████╗ ██████╗████████╗
# ██║   ██║██╔══██╗██╔══██╗██╔══██╗╚══██╔══╝██╔════╝    ██╔══██╗██╔════╝██╔════╝╚══██╔══╝
# ██║   ██║██████╔╝██║  ██║███████║   ██║   █████╗      ███████║██║     ██║        ██║   
# ██║   ██║██╔═══╝ ██║  ██║██╔══██║   ██║   ██╔══╝      ██╔══██║██║     ██║        ██║   
# ╚██████╔╝██║     ██████╔╝██║  ██║   ██║   ███████╗    ██║  ██║╚██████╗╚██████╗   ██║   
#  ╚═════╝ ╚═╝     ╚═════╝ ╚═╝  ╚═╝   ╚═╝   ╚══════╝    ╚═╝  ╚═╝ ╚═════╝ ╚═════╝   ╚═╝   
##################################################################################################################
	public function updateAcct(Request $request, $id)
	{

		$user = User::findOrFail($id);
		//dd($user);
			$user->email = $request->email;
			$user->public_email = $request->public_email;
		$user->save();
		
		// Save entry to log file using built-in Monolog
		//Log::info(Auth::user()->username . " (" . Auth::user()->id . ") UPDATED article (" . $article->id . ")\r\n",
		//    [json_decode($article, true)]
		//);

		Session::flash('success','Your account has been updated successfully.');
		return redirect()->route('backend.profile', $id)->withInput(['tab'=>'account']);
	}


##################################################################################################################
# ██╗   ██╗██████╗ ██████╗  █████╗ ████████╗███████╗    ███████╗███████╗████████╗████████╗██╗███╗   ██╗ ██████╗ ███████╗
# ██║   ██║██╔══██╗██╔══██╗██╔══██╗╚══██╔══╝██╔════╝    ██╔════╝██╔════╝╚══██╔══╝╚══██╔══╝██║████╗  ██║██╔════╝ ██╔════╝
# ██║   ██║██████╔╝██║  ██║███████║   ██║   █████╗      ███████╗█████╗     ██║      ██║   ██║██╔██╗ ██║██║  ███╗███████╗
# ██║   ██║██╔═══╝ ██║  ██║██╔══██║   ██║   ██╔══╝      ╚════██║██╔══╝     ██║      ██║   ██║██║╚██╗██║██║   ██║╚════██║
# ╚██████╔╝██║     ██████╔╝██║  ██║   ██║   ███████╗    ███████║███████╗   ██║      ██║   ██║██║ ╚████║╚██████╔╝███████║
#  ╚═════╝ ╚═╝     ╚═════╝ ╚═╝  ╚═╝   ╚═╝   ╚══════╝    ╚══════╝╚══════╝   ╚═╝      ╚═╝   ╚═╝╚═╝  ╚═══╝ ╚═════╝ ╚══════╝
##################################################################################################################
	public function updateSettings(Request $request, $id)
	{
		//dd($id);
		$profile = Profile::findOrFail($id);
		//dd($profile);
			$profile->frontendStyle = $request->frontendStyle;
			$profile->backendStyle = $request->backendStyle;
			$profile->author_format = $request->author_format;
			$profile->alert_fade_time = $request->alert_fade_time;
			$profile->date_format = $request->date_format;
			$profile->landing_page_id = $request->landing_page_id;
			$profile->rows_per_page = $request->rows_per_page;
			$profile->display_size = $request->display_size;
			$profile->action_buttons = $request->action_buttons;
			$profile->layout = $request->layout;
		$profile->save();
		
		// Save entry to log file using built-in Monolog
		//Log::info(Auth::user()->username . " (" . Auth::user()->id . ") UPDATED article (" . $article->id . ")\r\n",
		//    [json_decode($article, true)]
		//);

		Session::flash('success','Your preferences have been updated successfully.');
		return redirect()->route('backend.profile', $id)->withInput(['tab'=>'settings']);
	}


}
