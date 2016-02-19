<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Product;
use Cart;

class PagesController extends Controller
{
	public function showHome()
	{
		return view('home');
	}
	
	public function login(Request $request)
	{
		//member login
		if($request->has('member'))
			$pin = $request->input('pin');
			   
		//guest login
		else if($request->has('guest'))
			$pin = NULL;
			
		$user = User::where('pin', $pin)->first();
	
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
}