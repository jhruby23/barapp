@extends('app')

@section('content')
	
	<div class="jumbotron">
		<div class="container">
			<h1>NODE5 Bar app</h1>
		</div>
	</div>
	
	<h2>Hi, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} from {{ Auth::user()->team->name }}!</h2>
	{{ link_to_action('PagesController@logout', 'Cancel order') }}
	
	<hr>
	
	<div id="cart">
		@include('partials.cart')
	</div>
	
	<hr>
	
	<div id="products">
		<h2>Products</h2>
		
		<ul class="nav nav-pills nav-justified">
			<li class="active"><a href="#food">Food</a></li>
			<li><a href="#drinks">Drinks</a></li>
			<li><a href="#other">Other</a></li>
		</ul>
		
		<ul id="food" class="offer">
		@foreach($food as $product)
			<li>
				<p>{{ $product['name'] }}</p>
				<p>{{ $product['description'] }}</p>
				@if(is_null(Auth::user()->pin))
					<p>{{ $product['guest_price'] }} Kč</p>
				@else
					<p>{{ $product['member_price'] }} Kč</p>
				@endif
				<p>{{ $product['category']['name'] }}</p>
				<p><a href="#" data-id="{{ $product['id'] }}" role="add-to-cart">Add to cart</a></p>
			</li>
		@endforeach
		</ul>
		
		<ul id="drinks" class="offer" style="display: none;">
		@foreach($drinks as $product)
			<li>
				<p>{{ $product['name'] }}</p>
				<p>{{ $product['description'] }}</p>
				@if(is_null(Auth::user()->pin))
					<p>{{ $product['guest_price'] }} Kč</p>
				@else
					<p>{{ $product['member_price'] }} Kč</p>
				@endif
				<p>{{ $product['category']['name'] }}</p>
				<p><a href="#" data-id="{{ $product['id'] }}" role="add-to-cart">Add to cart</a></p>
			</li>
		@endforeach
		</ul>
		
		<ul id="other" class="offer" style="display: none;">
		@foreach($other as $product)
			<li>
				<p>{{ $product['name'] }}</p>
				<p>{{ $product['description'] }}</p>
				@if(is_null(Auth::user()->pin))
					<p>{{ $product['guest_price'] }} Kč</p>
				@else
					<p>{{ $product['member_price'] }} Kč</p>
				@endif
				<p>{{ $product['category']['name'] }}</p>
				<p><a href="#" data-id="{{ $product['id'] }}" role="add-to-cart">Add to cart</a></p>
			</li>
		@endforeach
		</ul>
	</div>
	
	<hr>
	
	<div id="checkout">
		@include('partials.checkout')
	</div>
	
	<hr>

	<div id="orders">
		<h2>My orders</h2>
		@if(empty(Auth::user()->orders->toArray()))
			<p>You haven't made any orders yet!</p>
		@else
		<ul>
			@foreach(Auth::user()->orders as $order)
			<li>
				<p>{{ $order['created_at']->format('d.m.Y') }}</p>
				<p>Total price: {{ $order['total_price'] }} Kč</p>
				@foreach($order->items as $item)
					<p>{{ $item->quantity }}x {{ $item->product->name }} {{ $item->subtotal_price }} Kč</p>
				@endforeach
			</li>
			@endforeach
		</ul>
		@endif
	</div>
@endsection