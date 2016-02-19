<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use Cart;
use Auth;

class DashboardController extends Controller
{
	public function __construct()
	{
		$this->updateCart();
	}
	
   public function showDashboard()
	{
		//$cat = Category::with('products')->drinks()->get()->toArray();
		//$products_new = [];
		
		$products = Product::with('category')->enabled()->get()->toArray();
		
		$this->updateCart();
		
		return view('dashboard', ['products' => $products, 'items' => $this->items, 'price' => $this->price]);
	}
	
	public function updateCart()
	{
		$this->items = Cart::content()->toArray();
		$this->price = Cart::total();
	}

	public function addToCart($id)
	{
		$product = Product::find($id)->toArray();
		
		if(is_null(Auth::user()->pin))
			$price = $product['guest_price'];
		else
			$price = $product['member_price'];
		
		Cart::add($id, $product['name'], 1, $price);
		
		$this->updateCart();
		
		return view('cart', ['items' => $this->items, 'price' => $this->price]);
	}
	
	public function removeFromCart($id)
	{			
		$rowid = Cart::search(['id' => $id])['0'];
		
		Cart::remove($rowid);
		
		$this->updateCart();
		
		return view('cart', ['items' => $this->items, 'price' => $this->price]);
	}
	
	public function emptyCart()
	{
		Cart::destroy();	
	
		$this->updateCart();
		
		return view('cart', ['items' => $this->items, 'price' => $this->price]);
	}
}
