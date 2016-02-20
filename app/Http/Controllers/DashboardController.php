<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Order;
use App\OrderLine;
use Cart;
use Auth;

class DashboardController extends Controller
{
	public function __construct()
	{
		$this->updateCart();
	}
	
	public function updateCart()
	{
		$this->items = Cart::content()->toArray();
		$this->price = Cart::total();
	}
	
	public function checkAJAX()
	{
		if(!Request::ajax())
			return redirect('dashboard');
	}
	
   public function showDashboard()
	{
		//$cat = Category::with('products')->drinks()->get()->toArray();
		//$products_new = [];
		
		$products = Product::with('category')->enabled()->get()->toArray();
		
		$this->updateCart();
		
		return view('dashboard', ['products' => $products, 'items' => $this->items, 'price' => $this->price]);
	}

	public function addToCart($id)
	{
		$this->checkAJAX();
		
		$product = Product::find($id)->toArray();
		
		if(is_null(Auth::user()->pin))
			$price = $product['guest_price'];
		else
			$price = $product['member_price'];
		
		Cart::add($id, $product['name'], 1, $price);
		
		$this->updateCart();
		
		return view('partials.cart', ['items' => $this->items, 'price' => $this->price]);
	}
	
	public function removeFromCart($id)
	{			
		$this->checkAJAX();
			
		$rowid = Cart::search(['id' => $id])['0'];
		
		$count = Cart::get($rowid)->qty;

		Cart::update($rowid, $count-1);	
		
		$this->updateCart();
		
		return view('partials.cart', ['items' => $this->items, 'price' => $this->price]);
	}
	
	public function emptyCart()
	{
		$this->checkAJAX();
			
		Cart::destroy();	
	
		$this->updateCart();
		
		return view('partials.cart', ['items' => $this->items, 'price' => $this->price]);
	}
	
	public function checkout()
	{
		$this->checkAJAX();
			
		return view('partials.checkout', ['items' => $this->items, 'price' => $this->price]);
	}
	
	public function makeOrder()
	{		
		$this->checkAJAX();
		
		$order = new Order;
		$order->user_id = Auth::user()->id;
		$order->total_price = $this->price;
		$order->save();
		
		foreach(Cart::content() as $item){
			$line = new OrderLine;
			$line->product_id = $item->id;
			$line->quantity = $item->qty;
			$line->subtotal_price = $item->subtotal;
			$line->order()->associate($order);
			$line->save();
		}
		
		Cart::destroy();
		
		Auth::logout();	
	}
}
