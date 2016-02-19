@extends('app')

@section('content')
	
	<h2>Hi, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}!</h2>

	{{ link_to_action('PagesController@logout', 'Cancel order') }}
	
	<h3>Shopping cart</h3>
	<p>Total price: {{ $price }} Kč</p>
	<ul>
	@foreach($cart as $item)
		<li>
			<p>Name: {{ $item['name'] }}</p>
			<p>Quantity: {{ $item['qty'] }}</p>
			<p>Price: {{ $item['price'] }} Kč</p>
			<p>Subtotal: {{ $item['subtotal'] }} Kč</p>
			<p>{{ link_to_route('cart.remove', 'Remove from cart', $item['id']) }}</p>
		</li>
	@endforeach
	</ul>
	
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
			<p>{{ link_to_route('cart.add', 'Add to cart', $product['id']) }}</p>
		</li>
	@endforeach
	</ul>
@endsection