	<h2>Order</h2>
	<ul class="list-group">
	@foreach($items as $item)
		@for($i = 0; $i < $item['qty']; $i++)
		<li class="list-group-item">
			<p>{{ $item['name'] }} {{ $item['price'] }} Kč <a href="#" data-id="{{ $item['id'] }}" role="remove-from-cart">x</a></p>
		</li>
		@endfor
	@endforeach
	</ul>
	
	@if($items)
		<p><a href="#" role="checkout">Checkout {{ $price }} Kč</a></p>
		<p><a href="#" id="empty-cart">Cancel order</a></p>
	@else
		<p>No items in cart!</p>
	@endif