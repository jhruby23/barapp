@extends('app')

@section('content') 
	@yield('heading')
	
	<p>{{ link_to_route('dashboard.index', 'Back') }}</p>
	<p>{{ link_to_route('account.orders', 'Your orders') }}</p>
	<p>{{ link_to_route('account.group', 'Group spendings') }}</p>
	<p>{{ link_to_route('account.invoices', 'Invoices') }}</p>
	
	<hr>
	
	<div id="content">
		@yield('data')
	</div>

@endsection