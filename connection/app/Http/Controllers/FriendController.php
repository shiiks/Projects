<?php

namespace Connection\Http\Controllers;

use Auth;
use Connection\Models\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
	public function getIndex()
	{
		$friends=Auth::user()->friends();
		$requests=Auth::user()->friendsRequest();
		return view('friends.index')->with('friends', $friends)->with('requests', $requests);
	}

	public function getAdd($username)
	{
		$user=User::where('username',$username)->first();

		if(!$user)
		{
			return redirect()->route('home')->with('info', 'The User Could Not Be Found.');
		}

		if(Auth::user()->id === $user->id)
		{
			return redirect()->route('home');
		}

		if(Auth::user()->hasFriendRequestPending($user) || $user->hasFriendRequestPending(Auth::user()))
		{
			return redirect()->route('profile.index', ['username'=> $user->username])->with('info','Connection Request Already Pending.');
		}

		if(Auth::user()->isFriendsWith($user))
		{
			return redirect()->route('profile.index', ['username'=> $user->username])->with('info','You Are Already Connected.');
		}

		Auth::user()->addFriend($user);

		return redirect()->route('profile.index', ['username' => $username])->with('info', 'Connection Request Sent.');
	}

	public function getAccept($username)
	{
		$user=User::where('username',$username)->first();

		if(!$user)
		{
			return redirect()->route('home')->with('info', 'The User Could Not Be Found.');
		}

		if(!Auth::user()->hasFriendRequestReceived($user))
		{
			return redirect()->route('home');
		}

		Auth::user()->acceptFriendRequests($user);

		return redirect()->route('profile.index', ['username' =>$user->username])->with('info','Connection Request Accepted.');
	}

	public function postDelete($username)
	{
		$user=User::where('username', $username)->first();

		if(!Auth::user()->isFriendsWith($user))
		{
			return redirect()->back();
		}

		Auth::user()->deleteFriend($user);

		return redirect()->back()->with('info', 'Connection Deleted.');
	}
} 