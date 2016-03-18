<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>NODE5 Bar app</title>
	
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	{{-- Html::style('/css/style.css') --}}
	{{ Html::style('/css/remodal.css') }}
	{{ Html::style('/css/remodal-default-theme.css') }}
	
	<script type="text/javascript" src="//code.jquery.com/jquery-2.2.0.min.js"></script>
	<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	{{ Html::script('/js/main.js') }}

</head>
<body class="{{ $body or '' }}">
	<div class="container">
	
	@yield('content')
	
	</div>
	{{ Html::script('/js/remodal.min.js') }}
</body>
</html>