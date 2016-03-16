@extends('account.master')

@section('heading')
	<h2>Hi {{ Auth::user()->first_name }}, your current group spendings: {{ $spendings }} Kč</h2>
@endsection

@section('data')
	<h2>Your group</h2>

	<ul class="list-group">
	@foreach($group as $user)
		<li class="list-group-item">
			{{ $user->first_name }} {{ $user->last_name }} {{ $user->unpaidOrders->sum('total_price') }} Kč {{ $user->status }}
		</li>
	@endforeach
	</ul>
@endsection