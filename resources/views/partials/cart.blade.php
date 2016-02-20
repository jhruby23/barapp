	<h2>Shopping cart</h2>
	<p>Total price: {{ $price }} Kč</p>
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
	
	@if($items)
		<a href="#" role="checkout">Checkout</a>
	@endif