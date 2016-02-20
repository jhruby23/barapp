<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>NODE5 Bar app</title>
	
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<!--<link href="/css/style.css" rel="stylesheet">-->
	
	<script type="text/javascript" src="//code.jquery.com/jquery-2.2.0.min.js"></script>
	{{ Html::script('/js/main.js') }}

</head>
<body class="{{ $body or '' }}">
	<div class="container">
	
	@yield('content')
	
	</div>
</body>
</html>