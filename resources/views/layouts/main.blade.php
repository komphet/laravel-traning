<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
</head>
<body>
<div>Blog Header</div>
@yield('content')
<div>Blog Footer</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@yield('script')
</body>
</html>