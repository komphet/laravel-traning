<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
</head>
<body>
	<a href="{{route('post.create')}}">[Create Post]</a>
<ul>
	@for($i = 1 ; $i <= 10 ; $i++)
	<li>post {{$i}}<a href="{{route('post.show',$i)}}">[Show]</a><a href="{{route('post.edit',$i)}}">[Edit]</a></li>
	@endfor
</ul>
</body>
</html>