	<h2>My orders</h2>
	@if($orders->isEmpty())
		<p>You haven't made any orders yet!</p>
	@else
	<ul>
		@foreach($orders as $order)
		<li>
			<p>{{ $order->created_at->format('d.m.Y') }}</p>
			<p>Total price: {{ $order->total_price }} Kč</p>
			@foreach($order->items as $item)
				<p>{{ $item->quantity }}x {{ $item->product->name }} {{ $item->subtotal_price }} Kč</p>
			@endforeach
			<p><a href="#" data-id="{{ $order->id }}" role="refund">Refund</a></p>
		</li>
		@endforeach
	</ul>
	@endif