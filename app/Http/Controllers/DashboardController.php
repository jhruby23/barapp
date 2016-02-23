<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Order;
use App\OrderItem;
use App\User;
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
		$food = Product::with('category')->whereHas('category', function($q){
			$q->food();
		})->enabled()->get();
		
		$drinks = Product::with('category')->whereHas('category', function($q){
			$q->drinks();
		})->enabled()->get();
		
		$other = Product::with('category')->whereHas('category', function($q){
			$q->other();
		})->enabled()->get();
		
		$this->updateCart();
		
		return view('dashboard', ['food' => $food, 'drinks' => $drinks, 'other' => $other, 'items' => $this->items, 'price' => $this->price]);
	}

	public function addToCart($id)
	{
		$this->checkAJAX();
		
		$product = Product::enabled()->find($id);
		
		if(is_null(Auth::user()->pin))
			$price = $product->guest_price;
		else
			$price = $product->member_price;
		
		Cart::add($id, $product->name, 1, $price);
		
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
		
		if(empty(Cart::content()->toArray()))
			exit(1);
		
		$order = new Order;
		$order->user_id = Auth::user()->id;
		$order->total_price = $this->price;
		$order->save();
		
		foreach(Cart::content() as $item){
			$line = new OrderItem;
			$line->product_id = $item->id;
			$line->quantity = $item->qty;
			$line->subtotal_price = $item->subtotal;
			$line->order()->associate($order);
			$line->save();
		}
		
		Cart::destroy();
		
		Auth::logout();	
	}
	
	public function refund($id)
	{		
		$this->checkAJAX();
		
		$order = Order::where('user_id', Auth::user()->id)->find($id);
		$order->items()->delete();
		$order->delete();
		
		return view('partials.orders');
	}
}
