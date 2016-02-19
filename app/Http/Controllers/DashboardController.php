<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use Cart;
use Auth;

class DashboardController extends Controller
{
   public function showDashboard()
	{		
		$products = Product::with('category')->enabled()->get()->toArray();
		
		$cart = Cart::content()->toArray();
		
		$price = Cart::total();
		
		return view('dashboard', compact('products', 'cart', 'price'));
	}

	public function addToCart($id)
	{
		$product = Product::find($id)->toArray();
		
		if(is_null(Auth::user()->pin))
			$price = $product['guest_price'];
		else
			$price = $product['member_price'];
		
		Cart::add($id, $product['name'], 1, $price);
		
		return redirect('dashboard');
	}
	
	public function removeFromCart($id)
	{			
		$rowid = Cart::search(['id' => $id])['0'];
		
		Cart::remove($rowid);
		
		return redirect('dashboard');
	}
}
