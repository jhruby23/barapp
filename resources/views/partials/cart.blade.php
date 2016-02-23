	<h2>Shopping cart</h2>
	<p>Total price: {{ $price }} Kč</p>
	<p><a href="#" id="empty-cart">Empty cart</a></p>
	<ul>
	@foreach($items as $item)
		<li>
			<p>Name: {{ $item['name'] }}</p>
			<p>Quantity: <a href="#" data-id="{{ $item['id'] }}" role="remove-from-cart">-</a> {{ $item['qty'] }} <a href="#" data-id="{{ $item['id'] }}" role="add-to-cart">+</a></p>
			<p>Price: {{ $item['price'] }} Kč</p>
			<p>Subtotal: {{ $item['subtotal'] }} Kč</p>
		</li>
	@endforeach
	</ul>
	
	@if($items)
		<a href="#" role="checkout">Checkout</a>
	@endif