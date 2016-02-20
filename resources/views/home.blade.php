@extends('app', ['body' => 'home'])

@section('content')
	<!--
	<header class="navbar">
		<h1>NODE5 Bar app</h1>
	</header>
	
	<div class="card">
		<h2>Already a member?</h2>
		<p>Just enter your pin</p>
		
		<div id="pin">
			<div class="pin_box"></div>
			<div class="pin_box"></div>
			<div class="pin_box"></div>
			<div class="pin_box"></div>
		</div>
		
		<div class="row">
			<a class="key">1</a>
			<a class="key">2</a>
			<a class="key">3</a>
		</div>
		
		<div class="row">
			<a class="key">4</a>
			<a class="key">5</a>
			<a class="key">6</a>
		</div>
		
		<div class="row">
			<a class="key">7</a>
			<a class="key">8</a>
			<a class="key">9</a>
		</div>
		
		<div class="row">
			<a class="key">&nbsp;</a>
			<a class="key">0</a>
			<a class="key">&lt;-</a>
		</div>
	</div>
	
	<div class="card">
		<h2>Paying with cash?</h2>
		<p>No problem, shop as a guest, then put money in our self-checkout box.</p>
		
		<a class="key" id="guest">Enter</a>
	</div>
	-->
	
	<div class="jumbotron">
		<div class="container">
			<h1>NODE5 Bar app</h1>
		</div>
	</div>

	<div id="login-form">
		{!! Form::open(['action' => 'PagesController@login']) !!}
		
		<h2>Member login</h2>
			<div class="form-group">
			{!! Form::password('pin', ['class' => 'form-control']) !!}
			</div>
	
			{!! Form::submit('Login', ['class' => 'btn btn-default', 'name' => 'member']) !!}
	
		<h2>Guest login</h2>
			{!! Form::submit('Login', ['class' => 'btn btn-default', 'name' => 'guest']) !!}
			
		{!! Form::close() !!}
	</div>
@endsection