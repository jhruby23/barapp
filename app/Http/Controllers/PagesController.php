<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;

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
	
		return redirect('dashboard');
	}

	public function logout()
	{
		Auth::logout();
		
		return redirect('/');
	}
	
	public function dashboard()
	{
		if(Auth::check())
			print_r(Auth::user());
		
		return view('dashboard');
	}
}