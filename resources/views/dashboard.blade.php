@extends('app')

@section('content') 
	<h2>Hi {{ Auth::user()->first_name }}!
	
	@if(Auth::user()->isMember())
		Your current spendings: {{ $spendings }} Kč
	@endif
	</h2>
	
	<p>{{ link_to_route('logout', 'Log out') }}</p>
	
	@if(Auth::user()->isMember())
		<p>{{ link_to_route('account.orders', 'Account') }}</p>
	@endif
	
	<hr>
	
	<div id="cart">
		@include('partials.cart')
	</div>
	
	<hr>
	
	<div id="products">
		<h2>Products</h2>
		
		<ul class="nav nav-tabs nav-justified">
			<li class="active"><a href="#food">Food</a></li>
			<li><a href="#drinks">Drinks</a></li>
			<li><a href="#other">Other</a></li>
		</ul>
		
		<ul id="food" class="offer list-group">
		@foreach($food as $product)
			<li class="list-group-item">
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
		
		<ul id="drinks" class="offer list-group" style="display: none;">
		@foreach($drinks as $product)
			<li class="list-group-item">
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
		
		<ul id="other" class="offer list-group" style="display: none;">
		@foreach($other as $product)
			<li class="list-group-item">
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
	
	<div class="remodal" data-remodal-id="checkout">
		@include('partials.checkout')
	</div>
	
	<div style="width: 100%; height: 50px;"></div>
	
@endsection