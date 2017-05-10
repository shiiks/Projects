<?php

namespace Connection\Http\Controllers;
use Auth;
use Connection\Models\User;
use Illuminate\Http\Request;


class AuthController extends Controller
{
	public function getSignup()
	{
		return view('auth.signup');
	}

	public function postSignup(Request $request)
	{
		$this->validate($request, [
			'email' => 'required|unique:users|email|max:255',
			'username' => 'required|unique:users|alpha_dash|max:20',
			'password' => 'required|min:6',
		]);

		User::create([
			'email' => $request->input('email'),
			'username' => $request->input('username'),
			'password' => bcrypt($request->input('password')),
		]);

		return redirect()->route('home')->with('info', 'Your Account Has Been Created & Now You Can Sign In.');
	}

	public function getSignin()
	{
		return view('auth.signin');
	}

	public function postSignin(Request $request)
	{
		$this->validate($request, [
			'email' => 'required',
			'password' => 'required',
		]);

		if(!Auth::attempt($request->only(['email', 'password']), $request->has('remember')))
		{
			return redirect()->back()->with('info', 'Could Not Sign You In With Those Details.');
		}

		return redirect()->route('home')->with('info', 'You Are Now Signed In.');
	}

	public function getSignout()
	{
		Auth::logout();

		return redirect()->route('home')->with('info', 'You Are Succesfully Logged Out.See U Soon.');
	}
}