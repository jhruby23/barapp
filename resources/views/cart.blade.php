	<h3>Shopping cart</h3>
	<p>Total price: {{ $price }} Kč</p>
	<!--<p>{{ link_to_route('cart.empty', 'Empty cart') }}</p>-->
	<p><a href="#" id="empty-cart">Empty cart</a></p>
	<ul>
	@foreach($items as $item)
		<li>
			<p>Name: {{ $item['name'] }}</p>
			<p>Quantity: {{ $item['qty'] }}</p>
			<p>Price: {{ $item['price'] }} Kč</p>
			<p>Subtotal: {{ $item['subtotal'] }} Kč</p>
			<p><a href="#" data-id="{{ $item['id'] }}" role="remove-from-cart">Remove from cart</a></p>
		</li>
	@endforeach
	</ul>