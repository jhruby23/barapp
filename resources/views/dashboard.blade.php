@extends('app')

@section('content')
	
	<h2>Hi, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}!</h2>

	{{ link_to_action('PagesController@logout', 'Cancel order') }}
	
	<div id="cart">
	@include('cart')
	</div>
	
	<h3>Products</h3>
	<ul>
	@foreach($products as $product)
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
@endsection