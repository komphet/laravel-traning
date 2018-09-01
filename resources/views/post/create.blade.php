<!DOCTYPE html>
<html>
<head>
	<title>Create Post</title>
</head>
<body>
<form>
	<p>Title: <input type="text" name="title"></p>
	<p>Content: <textarea name="content"></textarea></p>
	<button type="submit">Save</button>
	<a href="{{route('post.index')}}">[Back]</a>
</form>
</body>
</html>