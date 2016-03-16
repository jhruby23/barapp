@extends('app')

@section('content')
	
	<div class="jumbotron">
		<div class="container">
			<h1>NODE5 Bar app</h1>
		</div>
	</div>
	
	<h2>Hi, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} from {{ Auth::user()->team->name }}!</h2>
	<p>{{ link_to_route('logout', 'Log out') }}</p>
	
	<p>{{ link_to_route('dashboard.index', 'Go back to shopping') }}</p>
	
	<hr>

	<h2>Actions</h2>
	<p>{{ link_to_route('categories.index', 'Manage categories') }}</p>
	<p>{{ link_to_route('products.index', 'Manage products') }}</p>

@endsection