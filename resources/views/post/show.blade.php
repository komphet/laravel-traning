<!DOCTYPE html>
<html>
<head>
	<title>Show Post</title>
</head>
<body>
<h1>Show Post</h1>
<p>This is a show post</p>
<a href="{{route('post.index')}}">[Back]</a>
<form method="post" action="{{route('post.destroy',1)}}">
	{{ csrf_field() }}
	{{ method_field("delete") }}
	<button type="submit">Delete</button>
</form>
</body>
</html>