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

	<h2>Categories</h2>
	{!! Form::open(['route' => 'categories.update']) !!}
		<div class="editboxes">
		@foreach($categories as $cat)
			<div class="form-group category-edit" style="width: 33%; display: inline-block;">
				<div class="input-group">
					{!! Form::text($cat->id.'[name]', $cat->name, ['class' => 'form-control']) !!}
					{!! Form::hidden($cat->id.'[type]', $cat->type) !!}
					<div class="input-group-btn">
						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="val" style="text-transform: capitalize;">{{ $cat->type }}</span> <span class="caret"></span></button>
						<ul class="category-select dropdown-menu dropdown-menu-right">
							<li><a href="#" data-type="food">Food</a></li>
							<li><a href="#" data-type="drinks">Drinks</a></li>
							<li><a href="#" data-type="other">Other</a></li>
						
							<li role="separator" class="divider"></li>
							<li><a href="#" data-type="remove">Remove category</a></li>
						
						</ul>
					</div>
				</div>
			</div>
		@endforeach
		</div>
		
		<div class="form-group">
		{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
		{!! Form::button('Add category', ['class' => 'btn btn-success', 'id' => 'add-category']) !!}
		</div>
	{!! Form::close() !!}

@endsection