<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Carbon\Carbon;
use Auth;
use Session;

class LoginController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles authenticating users for the application and
	| redirecting them to your home screen. The controller uses a trait
	| to conveniently provide its functionality to your applications.
	|
	*/

	use AuthenticatesUsers;

	/**
	* Where to redirect users after login.
	*
	* @var string
	*/
	// No longer needed as we override the authenticated function below
	//protected $redirectTo = '/';

	/**
	* Create a new controller instance.
	*
	* @return void
	*/
	public function __construct()
	{
	  $this->middleware('guest')->except('logout');
	}

	/**
	* Get the needed authorization credentials from the request.
	*
	* @param  \Illuminate\Http\Request  $request
	* @return array
	*/
	protected function credentials(Request $request)
	{
		$field = filter_var($request->get($this->username()), FILTER_VALIDATE_EMAIL)
			? $this->username()
			: 'username';

		return [
			$field => $request->get($this->username()),
			'password' => $request->password,
		];
	}

	// Override the default function form Laravel
	protected function authenticated(Request $request, User $user)
	{
		// Check if user that is logging in has a profile
		if($user->profile) {
			// If a profile exists, redirect them to their homepage of choice
			return redirect()->intended(Auth::user()->profile->landingPage->name);
		}

		// User user that is loggin in does not have a profile
		// Create a profile for the user
		$user->profile()->save(new Profile);
		// Redirect the user to the homepage
		return redirect('/');

	}


	// protected function setUserSession($user)
	// {
	//     session(
	//         [
	//             'userName' => $user->username,
	//             'email' => $user->email,
	//             'emailPublic' => $user->email_public,
	//             'createdAt' => $user->created_at,
	//             'firstName' => $user->profile->first_name,
	//             'lastName' => $user->profile->last_name,
	//             'telephone' => $user->profile->telephone,
	//             'authorFormat' => $user->profile->author_format,
	//             'dateFormat' => $user->profile->date_format,
	//             'image' => $user->profile->image,
	//             'rowsPerPage' => $user->profile->rows_per_page,
	//         ]
	//     );
	// }

	/**
	* Log the user out of the application.
	*
	* @return \Illuminate\Http\Response
	*/
	public function logout(Request $request)
	{
		$user = Auth::user();
			$user->last_login_date = Carbon::Now();
		$user->save();

		$this->guard()->logout();

		$request->session()->invalidate();

		return redirect('/');
	}

}
