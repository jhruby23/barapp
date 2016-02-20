@extends('app')

@section('content')
	
	<h2>Hi, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} from {{ Auth::user()->team->name }}!</h2>
	{{ link_to_action('PagesController@logout', 'Cancel order') }}
	
	<hr>
	
	<div id="cart">
		@include('partials.cart')
	</div>
	
	<hr>
	
	<div id="products">
		<h2>Products</h2>
		
		<h3>Food</h3>
		<ul>
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
		
		<h3>Drinks</h3>
		<ul>
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
		
		<h3>Other</h3>
		<ul>
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