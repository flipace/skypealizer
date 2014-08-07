<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Skypealizer</title>
	{{ HTML::style('assets/css/main.css') }}
</head>
<body>
	@yield('content')
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	{{ HTML::script('assets/js/main.js') }}
</body>
</html>
