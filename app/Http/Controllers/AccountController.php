<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Customer;
use App\User;
use App\Order;

class AccountController extends Controller
{
	public function showOrders()
	{
		$orders = Auth::user()->unpaidOrders;
	
		return view('account.orders', compact('orders'));	
	}
	
	public function showGroup()
	{
		$customer_id = Auth::user()->customer->id;
		
		$group = User::with('unpaidOrders')->where('customer_id', $customer_id)->get();
		
		$spendings = Customer::find($customer_id)->unpaidOrders->sum('total_price');
		
		return view('account.group', compact('group', 'spendings'));
	}
	
	public function showInvoices()
	{
		$group = User::where('customer_id', Auth::user()->customer->id)->lists('id')->toArray();
		
		$invoices = Order::paid()->whereIn('user_id', $group)->groupBy('invoice_nr')->selectRaw('invoice_nr, sum(total_price) as total_price')->get();
		
		return view('account.invoices', compact('invoices'));
	}
}
