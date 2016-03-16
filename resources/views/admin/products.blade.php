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

	<h2>Products</h2>
	{!! Form::open(['route' => 'products.update']) !!}
		<div class="editboxes">
		@foreach($products as $item)
			<div class="form-group category-edit">
				<div class="input-group">
					{!! Form::text($item->id.'[name]', $item->name, ['class' => 'form-control']) !!}
					{!! Form::hidden($item->id.'[category]', $item->category->id) !!}
					<div class="input-group-btn">
						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="val" style="text-transform: capitalize;">{{ $item->category->name }}</span> <span class="caret"></span></button>
						<ul class="dropdown-menu dropdown-menu-right">
							@foreach($food as $cat)
								<li><a href="#" data-name="{{ $cat->name }}" data-id="{{ $cat->id }}">{{ $cat->name }}</a></li>
							@endforeach
							
							<li role="separator" class="divider"></li>
							
							@foreach($drinks as $cat)
								<li><a href="#" data-name="{{ $cat->name }}" data-id="{{ $cat->id }}">{{ $cat->name }}</a></li>
							@endforeach
							
							<li role="separator" class="divider"></li>
							
							@foreach($other as $cat)
								<li><a href="#" data-name="{{ $cat->name }}" data-id="{{ $cat->id }}">{{ $cat->name }}</a></li>
							@endforeach
						
							<li role="separator" class="divider"></li>
							<li><a href="#" data-name="remove" data-id="remove">Remove product</a></li>
						
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