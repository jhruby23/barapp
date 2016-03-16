<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Customer;
use App\User;

class AccountController extends Controller
{
	public function showOrders()
	{
		$orders = Auth::user()->orders;
	
		return view('account.orders', compact('orders'));	
	}
	
	public function showGroup()
	{
		$group = User::where('customer_id', Auth::user()->customer->id)->whereNotIn('id', [Auth::id()])->get()->toArray();
		
		echo '<pre>';
		print_r($group);
	}
}
