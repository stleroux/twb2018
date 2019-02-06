<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\Role;
use App\User;
use Auth;
use DB;
use Hash;
use Route;
use Session;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
//use App\Http\Requests\UpdateUserPWDRequest;

class UsersController extends Controller
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
#  ██████╗██╗  ██╗ █████╗ ███╗   ██╗ ██████╗ ███████╗    ██████╗ ██╗    ██╗██████╗ 
# ██╔════╝██║  ██║██╔══██╗████╗  ██║██╔════╝ ██╔════╝    ██╔══██╗██║    ██║██╔══██╗
# ██║     ███████║███████║██╔██╗ ██║██║  ███╗█████╗      ██████╔╝██║ █╗ ██║██║  ██║
# ██║     ██╔══██║██╔══██║██║╚██╗██║██║   ██║██╔══╝      ██╔═══╝ ██║███╗██║██║  ██║
# ╚██████╗██║  ██║██║  ██║██║ ╚████║╚██████╔╝███████╗    ██║     ╚███╔███╔╝██████╔╝
#  ╚═════╝╚═╝  ╚═╝╚═╝  ╚═╝╚═╝  ╚═══╝ ╚═════╝ ╚══════╝    ╚═╝      ╚══╝╚══╝ ╚═════╝ 
##################################################################################################################
	public function changePassword(Request $request, $id){
	
		// if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
		// // The current password does not match the one provided
		// return redirect()->back()->with("error","Your current password does not match the password you provided. Please try again.")->withInput(['tab'=>'changePwd']);
		// }
		//dd($request);

		// if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
		// // Current password and new password are the same
		// return redirect()->back()->with("error","The new password cannot be the same as your current password. Please choose a different password.")->withInput(['tab'=>'changePwd']);
		// }

		$validatedData = $request->validate([
		//'current-password' => 'required',
		'new-password' => 'required|string|min:6|confirmed',
		]);

		//Change Password
		$user = User::findOrFail($id);
			$user->password = bcrypt($request->get('new-password'));
		$user->save();
		
		Session::flash ('success', $user->username . '\'s password was reset successfully.');
      return redirect()->route('users.index');

		// return redirect()->back()->with("success","Password changed successfully!")->withInput(['tab'=>'changePwd']);
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
	public function create()
	{
		$roles = Role::where('id','<=',70)->orderBy('id','desc')->pluck('display_name','id');

		return view('users.create', compact('roles'));
	}


##################################################################################################################
# ██████╗ ███████╗██╗     ███████╗████████╗███████╗     █████╗ ██╗     ██╗     
# ██╔══██╗██╔════╝██║     ██╔════╝╚══██╔══╝██╔════╝    ██╔══██╗██║     ██║     
# ██║  ██║█████╗  ██║     █████╗     ██║   █████╗      ███████║██║     ██║     
# ██║  ██║██╔══╝  ██║     ██╔══╝     ██║   ██╔══╝      ██╔══██║██║     ██║     
# ██████╔╝███████╗███████╗███████╗   ██║   ███████╗    ██║  ██║███████╗███████╗
# ╚═════╝ ╚══════╝╚══════╝╚══════╝   ╚═╝   ╚══════╝    ╚═╝  ╚═╝╚══════╝╚══════╝
// Mass Delete selected rows - all selected records
##################################################################################################################
	public function deleteAll(Request $request)
	{
		// Pass along the ROUTE value of the previous page
		//$ref = app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName();

		//dd('TEST_DELETE');
		$this->validate($request, [
			'checked' => 'required',
		]);
		//dd('TEST_DELETE');

		$checked = $request->input('checked');
		//dd($checked);

		// $article = Article::withTrashed()->findOrFail($checked);
		//Article::destroy($checked);
		User::whereIn('id', $checked)->forceDelete();

		Session::flash('success','The selected users were deleted successfully.');
		//return redirect()->route($ref);
		return redirect()->back();
	}


##################################################################################################################
# ██████╗ ███████╗██╗     ███████╗████████╗███████╗    ████████╗██████╗  █████╗ ███████╗██╗  ██╗███████╗██████╗ 
# ██╔══██╗██╔════╝██║     ██╔════╝╚══██╔══╝██╔════╝    ╚══██╔══╝██╔══██╗██╔══██╗██╔════╝██║  ██║██╔════╝██╔══██╗
# ██║  ██║█████╗  ██║     █████╗     ██║   █████╗         ██║   ██████╔╝███████║███████╗███████║█████╗  ██║  ██║
# ██║  ██║██╔══╝  ██║     ██╔══╝     ██║   ██╔══╝         ██║   ██╔══██╗██╔══██║╚════██║██╔══██║██╔══╝  ██║  ██║
# ██████╔╝███████╗███████╗███████╗   ██║   ███████╗       ██║   ██║  ██║██║  ██║███████║██║  ██║███████╗██████╔╝
# ╚═════╝ ╚══════╝╚══════╝╚══════╝   ╚═╝   ╚══════╝       ╚═╝   ╚═╝  ╚═╝╚═╝  ╚═╝╚══════╝╚═╝  ╚═╝╚══════╝╚═════╝ 
// Permanently remove the specified resource from storage - individual record
##################################################################################################################
   public static function deleteTrashed($id)
   {
      // if(!checkACL('manager')) {
         // return view('errors.403');
      // }
      //dd($id);
      $user = User::withTrashed()->findOrFail($id);
      $user->forceDelete();
      $user->profile->forceDelete();

      Session::flash ('success','The user was deleted successfully.');
      return redirect()->route('users.trashed');
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
	public function destroy($id)
	{
		// if(!checkACL('manager')) {
		//   return view('errors.403');
		// }

		$user = User::findOrFail($id);
		
		// Delete the user's profile image
		// We will not do this here in case the user wants to re-activate his account
		// if($user->profile->image) {
		// 	unlink(public_path('_profiles/' . $user->profile->image));
		// }

		// Delete the Profile
		$user->profile->delete();

		// Delete user from Users table
		$user->delete();
		
		// Save entry to log file using built-in Monolog
		//Log::info(Auth::user()->username . " (" . Auth::user()->id . ") DELETED category (" . $category->id . ")\r\n", [$category = json_decode($category, true)]);

		Session::flash('success', 'The user and his profile have successfully been trashed!');
		return redirect()->route('users.index');
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
		$user = User::findOrFail($id);
		$roles = Role::where('id','<=',70)->orderBy('id','desc')->pluck('display_name','id');

		return view('users.edit', compact('user','roles'));
	}


##################################################################################################################
# ██╗███╗   ██╗ █████╗  ██████╗████████╗██╗██╗   ██╗███████╗    ██╗   ██╗███████╗███████╗██████╗ ███████╗
# ██║████╗  ██║██╔══██╗██╔════╝╚══██╔══╝██║██║   ██║██╔════╝    ██║   ██║██╔════╝██╔════╝██╔══██╗██╔════╝
# ██║██╔██╗ ██║███████║██║        ██║   ██║██║   ██║█████╗      ██║   ██║███████╗█████╗  ██████╔╝███████╗
# ██║██║╚██╗██║██╔══██║██║        ██║   ██║╚██╗ ██╔╝██╔══╝      ██║   ██║╚════██║██╔══╝  ██╔══██╗╚════██║
# ██║██║ ╚████║██║  ██║╚██████╗   ██║   ██║ ╚████╔╝ ███████╗    ╚██████╔╝███████║███████╗██║  ██║███████║
# ╚═╝╚═╝  ╚═══╝╚═╝  ╚═╝ ╚═════╝   ╚═╝   ╚═╝  ╚═══╝  ╚══════╝     ╚═════╝ ╚══════╝╚══════╝╚═╝  ╚═╝╚══════╝
// Display a listing of the resource that were created since the user's last login.
##################################################################################################################
   public function inactiveUsers(Request $request, $key=null)
   {
      // if(!checkACL('guest')) {
      //     return view('errors.403');
      // }

      //$alphas = range('A', 'Z');
      $alphas = DB::table('users')
         ->select(DB::raw('DISTINCT LEFT(username, 1) as letter'))
         //->where('user_id', '=', Auth::user()->id)
         ->where('login_count', '=', 0)
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
         $users = User::inactiveUsers()
            ->where('username', 'like', $key . '%')
            ->get();
         return view('users.inactiveUsers', compact('users','letters'));
      }

      $users = User::inactiveUsers()->get();
      return view('users.inactiveUsers', compact('users','letters'));
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
	public function index(Request $request, $key=null)
	{
		// if(!checkACL('guest')) {
		//     return view('errors.403');
		// }

      // Set the variable so we can use a button in other pages to come back to this page
      Session::put('backURL', Route::currentRouteName());

		//$alphas = range('A', 'Z');
		$alphas = DB::table('users')
			->select(DB::raw('DISTINCT LEFT(username, 1) as letter'))
			//->where('published_at','<', Carbon::Now())
			->where('deleted_at','=', Null)
			->orderBy('letter')
			->get();

		$letters = [];
		foreach($alphas as $alpha) {
		  $letters[] = $alpha->letter;
		}

		// If $key value is passed
		if ($key) {
			$users = User::with('role','profile')
				->where('username', 'like', $key . '%')
				->orderBy('username', 'asc')
				->get();
			return view('users.index', compact('users','letters'));
		}

		// No $key value is passed
		$users = User::with('role','profile')->get();
		return view('users.index', compact('users','letters'));
	}


##################################################################################################################
# ███╗   ██╗███████╗██╗    ██╗    ██╗   ██╗███████╗███████╗██████╗ ███████╗
# ████╗  ██║██╔════╝██║    ██║    ██║   ██║██╔════╝██╔════╝██╔══██╗██╔════╝
# ██╔██╗ ██║█████╗  ██║ █╗ ██║    ██║   ██║███████╗█████╗  ██████╔╝███████╗
# ██║╚██╗██║██╔══╝  ██║███╗██║    ██║   ██║╚════██║██╔══╝  ██╔══██╗╚════██║
# ██║ ╚████║███████╗╚███╔███╔╝    ╚██████╔╝███████║███████╗██║  ██║███████║
# ╚═╝  ╚═══╝╚══════╝ ╚══╝╚══╝      ╚═════╝ ╚══════╝╚══════╝╚═╝  ╚═╝╚══════╝
// Display a listing of the resource that were created since the user's last login.
##################################################################################################################
   public function newUsers(Request $request, $key=null)
   {
      // if(!checkACL('guest')) {
      //     return view('errors.403');
      // }

      //$alphas = range('A', 'Z');
      $alphas = DB::table('users')
         ->select(DB::raw('DISTINCT LEFT(username, 1) as letter'))
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
         $users = User::with('role','profile')->newUsers()
            ->where('username', 'like', $key . '%')
            ->get();
         return view('users.newUsers', compact('users','letters'));
      }

      $users = User::with('role','profile')->newUsers()->get();
      //dd($users);
      return view('users.newUsers', compact('users','letters'));
   }


##################################################################################################################
# ██████╗ ███████╗███████╗███████╗████████╗    ██████╗ ██╗    ██╗██████╗ 
# ██╔══██╗██╔════╝██╔════╝██╔════╝╚══██╔══╝    ██╔══██╗██║    ██║██╔══██╗
# ██████╔╝█████╗  ███████╗█████╗     ██║       ██████╔╝██║ █╗ ██║██║  ██║
# ██╔══██╗██╔══╝  ╚════██║██╔══╝     ██║       ██╔═══╝ ██║███╗██║██║  ██║
# ██║  ██║███████╗███████║███████╗   ██║       ██║     ╚███╔███╔╝██████╔╝
# ╚═╝  ╚═╝╚══════╝╚══════╝╚══════╝   ╚═╝       ╚═╝      ╚══╝╚══╝ ╚═════╝ 
##################################################################################################################
	public function resetPwd(Request $request, $id)
	{
		$user = User::findOrFail($id);
		//dd($user);

		return view('users.resetPwd', compact('user'));
	}


##################################################################################################################
# ██████╗ ███████╗███████╗████████╗ ██████╗ ██████╗ ███████╗
# ██╔══██╗██╔════╝██╔════╝╚══██╔══╝██╔═══██╗██╔══██╗██╔════╝
# ██████╔╝█████╗  ███████╗   ██║   ██║   ██║██████╔╝█████╗  
# ██╔══██╗██╔══╝  ╚════██║   ██║   ██║   ██║██╔══██╗██╔══╝  
# ██║  ██║███████╗███████║   ██║   ╚██████╔╝██║  ██║███████╗
# ╚═╝  ╚═╝╚══════╝╚══════╝   ╚═╝    ╚═════╝ ╚═╝  ╚═╝╚══════╝
// RESTORE TRASHED FILE
##################################################################################################################
   public function restore($id)
   {
      $user = User::withTrashed()->findOrFail($id);

      // Restore the user's profile
      $user->profile()->withTrashed()->restore();
		
		// Restore the user's account
		$user->restore();

      // Restore the user's Profile
      $user->profile->restore();

      Session::flash ('success','The user was successfully restored.');
      return redirect()->route('users.trashed');
   }


##################################################################################################################
# ██████╗ ███████╗███████╗████████╗ ██████╗ ██████╗ ███████╗     █████╗ ██╗     ██╗     
# ██╔══██╗██╔════╝██╔════╝╚══██╔══╝██╔═══██╗██╔══██╗██╔════╝    ██╔══██╗██║     ██║     
# ██████╔╝█████╗  ███████╗   ██║   ██║   ██║██████╔╝█████╗      ███████║██║     ██║     
# ██╔══██╗██╔══╝  ╚════██║   ██║   ██║   ██║██╔══██╗██╔══╝      ██╔══██║██║     ██║     
# ██║  ██║███████╗███████║   ██║   ╚██████╔╝██║  ██║███████╗    ██║  ██║███████╗███████╗
# ╚═╝  ╚═╝╚══════╝╚══════╝   ╚═╝    ╚═════╝ ╚═╝  ╚═╝╚══════╝    ╚═╝  ╚═╝╚══════╝╚══════╝
// RESTORE ALL TRASHED FILE
##################################################################################################################
	public function restoreAll(Request $request)
	{
		//dd('TEST_RESTORE');
		//dd($request);
		//$this->validate($request, [
		//    'checked' => 'required',
		//]);
		//dd('TEST_RESTORE');

		$checked = $request->input('checked');
		//dd($checked);

		// $article = new Article();
		// $article->restore($checked);
		User::whereIn('id', $checked)->restore();

      // Restore the user's Profile
      Profile::whereIn('id', $checked)->restore();

		Session::flash('success','The selected articles were restored successfully.');
		return redirect()->route('users.trashed');
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

		return view('users.show', compact('user'));
	}


##################################################################################################################
# ███████╗██╗  ██╗ ██████╗ ██╗    ██╗ TRASHED
# ██╔════╝██║  ██║██╔═══██╗██║    ██║
# ███████╗███████║██║   ██║██║ █╗ ██║
# ╚════██║██╔══██║██║   ██║██║███╗██║
# ███████║██║  ██║╚██████╔╝╚███╔███╔╝
# ╚══════╝╚═╝  ╚═╝ ╚═════╝  ╚══╝╚══╝ 
// Display the specified resource
##################################################################################################################
   public function showTrashed($id)
   {
      $user = User::withTrashed()->findOrFail($id);

      // Assign user id to variable
      $user_id = $user->id;

      // Find the trashed profile of this user
      $profile = Profile::withTrashed()->findOrFail($user_id);

      return view('users.showTrashed', compact('user','profile'));
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
	public function store(CreateUserRequest $request)
	{
		// $input = $request->all();
		// $input['password'] = Hash::make($input['password']);

		// $user = User::create($input);

		// Session::flash('success','User created successfully!');
		// return redirect()->route('users.index');

		$user = new User;
			$user->username				= $request->username;
			$user->email					= $request->email;
			$user->role_id					= $request->role_id;
			$user->password				= bcrypt($request['password']);
		$user->save();

		$user->profile()->save(new Profile);

		Session::flash('success','User created successfully!');
		return redirect()->route('users.index');


	}


##################################################################################################################
# ████████╗██████╗  █████╗ ███████╗██╗  ██╗     █████╗ ██╗     ██╗     
# ╚══██╔══╝██╔══██╗██╔══██╗██╔════╝██║  ██║    ██╔══██╗██║     ██║     
#    ██║   ██████╔╝███████║███████╗███████║    ███████║██║     ██║     
#    ██║   ██╔══██╗██╔══██║╚════██║██╔══██║    ██╔══██║██║     ██║     
#    ██║   ██║  ██║██║  ██║███████║██║  ██║    ██║  ██║███████╗███████╗
#    ╚═╝   ╚═╝  ╚═╝╚═╝  ╚═╝╚══════╝╚═╝  ╚═╝    ╚═╝  ╚═╝╚══════╝╚══════╝
// Remove the specified resource from storage
// Used in the index page to soft delete multiple records
##################################################################################################################
	public function trashAll(Request $request)
	{
		// Pass along the ROUTE value of the previous page
		//$ref = app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName();

		$this->validate($request, [
			'checked' => 'required',
		]);

		$checked = $request->input('checked');
		//dd($checked);

		foreach($checked as $user) {
			$user = User::findOrFail($user);
			//$user->published_at = Null;
			$user->save();
			//dd($article);
		}

		User::destroy($checked);

      // Delete the user's Profile
      $user->profile->delete($checked);

		Session::flash('success','The selected articles were trashed successfully.');
		//return redirect()->route($ref);
		return redirect()->back();
	}


##################################################################################################################
# ████████╗██████╗  █████╗ ███████╗██╗  ██╗███████╗██████╗ 
# ╚══██╔══╝██╔══██╗██╔══██╗██╔════╝██║  ██║██╔════╝██╔══██╗
#    ██║   ██████╔╝███████║███████╗███████║█████╗  ██║  ██║
#    ██║   ██╔══██╗██╔══██║╚════██║██╔══██║██╔══╝  ██║  ██║
#    ██║   ██║  ██║██║  ██║███████║██║  ██║███████╗██████╔╝
#    ╚═╝   ╚═╝  ╚═╝╚═╝  ╚═╝╚══════╝╚═╝  ╚═╝╚══════╝╚═════╝ 
// Display a list of resources that have been trashed (Soft Deleted)
##################################################################################################################
   public function trashed(Request $request)
   {
      // if(!checkACL('guest')) {
      //     return view('errors.403');
      // }

      // Set the variable so we can use a button in other pages to come back to this page
      Session::put('backURL', Route::currentRouteName());

      $users = User::onlyTrashed()->get();
      // dd($users);
      return view('users.trashed', compact('users'));
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
	public function update(UpdateUserRequest $request, $id)
	{
		// if(!checkACL('manager')) {
		//   return view('errors.403');
		// }

		// Get the user from the database
		$user = User::findOrFail($id);
			$user->username = $request->input('username');
			$user->email = $request->input('email');
			$user->role_id = $request->input('role_id');
		
		// Save the data to the database
		$user->save();

		// Save entry to log file using built-in Monolog
		//Log::info(Auth::user()->username . " (" . Auth::user()->id . ") UPDATED user (" . $user->id . ")\r\n", [$user = json_decode($user, true)]);

		// Set flash data with success message
		Session::flash ('success', 'The user was successfully updated!');
		// Redirect to posts.show
		return redirect()->route('users.show', $user->id);
	}

}
