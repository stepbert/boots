<!doctype html>
<html lang="en">
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" lang="en" content="" />
	<meta name="robots" content="index, follow" />
	<!--link rel="shortcut icon" href="favicon.ico" /-->
	{{ HTML::style('packages/cloudraker/boots/css/index.css') }}
	{{ HTML::style('css/index.css') }}
	@yield('css')
</head>
<body>

@yield('body')

{{ HTML::script('http://code.jquery.com/jquery-2.0.3.min.js') }}
@yield('js')
{{-- HTML::script('js/index.js') --}}
</body>
</html>
