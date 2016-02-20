	<h3>Checkout</h3>
	<p>Total price: {{ $price }} Kč</p>
	<ul>
	@foreach($items as $item)
		<li>{{ $item['qty'] }}x {{ $item['name'] }} {{ $item['subtotal'] }} Kč</p>
		</li>
	@endforeach
	</ul>
