<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>NODE5 Bar app</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="jumbotron">
			<h1>NODE5 Bar app</h1>
		</div>
		
		<div id="login-form">
			{!! Form::open(['action' => 'PagesController@login']) !!}
			
			<h2>Member login</h2>
				<div class="form-group">
				{!! Form::text('pin', '', ['class' => 'form-control']) !!}
				</div>
		
				{!! Form::submit('Login', ['class' => 'btn btn-default', 'name' => 'member']) !!}
		
			<h2>Guest login</h2>
				{!! Form::submit('Login', ['class' => 'btn btn-default', 'name' => 'guest']) !!}
				
			{!! Form::close() !!}
		</div>
	</div>
</body>
</html>