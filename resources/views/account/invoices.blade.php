@extends('account.master')

@section('heading')
	<h2>Hi {{ Auth::user()->first_name }}, here are your invoices</h2>
@endsection

@section('data')
	<h2>Your invoices</h2>

	<ul class="list-group">
	@foreach($invoices as $inv)
		<li class="list-group-item">
			Invoice #{{ $inv->invoice_nr }} | {{ $inv->total_price }} Kč <a href="#">Request details</a>
		</li>
	@endforeach
	</ul>
@endsection