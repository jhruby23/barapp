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
		$orders = Auth::user()->unpaidOrders;
	
		return view('account.orders', compact('orders'));	
	}
	
	public function showGroup()
	{
		$group = User::with('unpaidOrders')->where('customer_id', Auth::user()->customer->id)->get();
		
		$spendings = $group->sum(function($user){
			$sum = 0;
			foreach($user->unpaidOrders as $order)
				$sum += $order->total_price;
			return $sum;
		});
		
		return view('account.group', compact('group', 'spendings'));
	}
}
