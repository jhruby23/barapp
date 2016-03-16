<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Product;
use Cart;
use App\Http\Requests\UserUpdateRequest;

class PagesController extends Controller
{
	public function showHome()
	{
		return view('home');
	}
	
	public function login(Request $request)
	{
		//member login
		if(Request::has('member'))
			$pin = Request::input('pin');
			   
		//guest login
		else if(Request::has('guest'))
			$pin = NULL;
			
		$user = User::where('pin', $pin)->active()->first();
	
		//no user with this pin found
		if(!$user)
			return redirect('/');
			
		Auth::login($user, true);
		
		Cart::destroy();
	
		return redirect('dashboard');
	}

	public function logout()
	{
		Auth::logout();
		
		return redirect('/');
	}	
	
	public function updateUser(UserUpdateRequest $request)
	{
		User::findOrFail(Auth::user()->id)->update($request->all());
	}
}