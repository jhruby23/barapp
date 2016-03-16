	<h2>Order</h2>
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
		<p><a href="#" role="checkout">Checkout {{ $price }} Kč</a></p>
		<p><a href="#" id="empty-cart">Cancel order</a></p>
	@else
		<p>No items in cart!</p>
	@endif