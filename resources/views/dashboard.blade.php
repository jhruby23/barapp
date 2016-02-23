@extends('app')

@section('content')
	
	<div class="jumbotron">
		<div class="container">
			<h1>NODE5 Bar app</h1>
		</div>
	</div>
	
	<h2>Hi, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} from {{ Auth::user()->team->name }}!</h2>
	<p>{{ link_to_action('PagesController@logout', 'Cancel order') }}</p>
	
	@if(Auth::user()->isAdmin())
	<p><a href="admin">Go to admin panel</a></p>
	@endif
	
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
				<p>{{ $product->name }}</p>
				<p>{{ $product->description }}</p>
				@if(Auth::user()->isGuest())
					<p>{{ $product->guest_price }} Kč</p>
				@else
					<p>{{ $product->member_price }} Kč</p>
				@endif
				<p>{{ $product->category->name }}</p>
				<p><a href="#" data-id="{{ $product->id }}" role="add-to-cart">Add to cart</a></p>
			</li>
		@endforeach
		</ul>
		
		<ul id="drinks" class="offer" style="display: none;">
		@foreach($drinks as $product)
			<li>
				<p>{{ $product->name }}</p>
				<p>{{ $product->description }}</p>
				@if(Auth::user()->isGuest())
					<p>{{ $product->guest_price }} Kč</p>
				@else
					<p>{{ $product->member_price }} Kč</p>
				@endif
				<p>{{ $product->category->name }}</p>
				<p><a href="#" data-id="{{ $product->id }}" role="add-to-cart">Add to cart</a></p>
			</li>
		@endforeach
		</ul>
		
		<ul id="other" class="offer" style="display: none;">
		@foreach($other as $product)
			<li>
				<p>{{ $product->name }}</p>
				<p>{{ $product->description }}</p>
				@if(Auth::user()->isGuest())
					<p>{{ $product->guest_price }} Kč</p>
				@else
					<p>{{ $product->member_price }} Kč</p>
				@endif
				<p>{{ $product->category->name }}</p>
				<p><a href="#" data-id="{{ $product->id }}" role="add-to-cart">Add to cart</a></p>
			</li>
		@endforeach
		</ul>
	</div>
	
	<hr>
	
	<div id="checkout">
		@include('partials.checkout')
	</div>
	
	@if(!Auth::user()->isGuest())
	<hr>

	<div id="orders">
		@include('partials.orders')
	</div>
	@endif
	
@endsection