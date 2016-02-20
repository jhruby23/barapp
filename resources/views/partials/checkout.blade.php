	<h3>Checkout</h3>
	<p>Total price: {{ $price }} Kč</p>
	<ul>
	@foreach($items as $item)
		<li>{{ $item['qty'] }}x {{ $item['name'] }} {{ $item['subtotal'] }} Kč</p>
		</li>
	@endforeach
	</ul>
	
	<p><a href="#" role="cancel-checkout">Cancel</a></p>
	<p><a href="#" role="make-order">Make order</a></p>
