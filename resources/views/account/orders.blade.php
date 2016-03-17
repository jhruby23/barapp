@extends('account.master')

@section('heading')
	<h2>Hi {{ Auth::user()->first_name }}, these are your orders for {{ \Carbon\Carbon::now()->format('m/Y') }} </h2>
@endsection

@section('data')
	<h2>Your orders</h2>
	
	@if(!$orders->isEmpty())
		<ul class="list-group">
		@foreach($orders as $order)
			<li class="list-group-item">
				<p>Order no. {{ $order->id }}</p>
				<p>{{ $order->created_at->diffForHumans() }}</p>
				<p>Total price {{ $order->total_price }} Kč</p>
				
				@foreach($order->items as $item)
					<p>{{ $item->product->name }}	{{ $item->subtotal_price }} Kč <a href="#">Request refund</a></p>
				@endforeach
			</li>
		@endforeach
		</ul>
	@else
		<p>No orders</p>
	@endif
@endsection