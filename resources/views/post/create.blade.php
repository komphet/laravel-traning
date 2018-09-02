<!DOCTYPE html>
<html>
<head>
	<title>Create Post</title>
</head>
<body>
<form action="{{ (is_null($post)) ? route('post.store') : route('post.update',$post->id) }}" method="post">
	{{ csrf_field() }}
	{{ is_null($post) ? "" : method_field('put') }}
	<p>Title: <input type="text" name="title" value="{{is_null($post) ? '' : $post->title }}"></p>
	<p>Content: <textarea name="content">{{is_null($post) ? '' : $post->content }}</textarea></p>
	<button type="submit">Save</button>
	<a href="{{ route('post.index') }}">[Back]</a>
</form>
</body>
</html>