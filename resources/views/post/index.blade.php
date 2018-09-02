@extends('layouts.main')

@section('title')
Post List
@endsection

@section('content')
@include('post.message')

<a href="{{route('post.create')}}">[Create Post]</a>
<p>Search: <input type="text" name="q" onkeyup="search($(this).val())"><span id="loading"></span></p>
<hr>
<ul id="posts">
	@forelse($posts as $index => $post)
	<li>
		<strong>{{$post['title']}}</strong> - by {{$post->user->name}}
		<a href="{{route('post.show',$post['id'])}}">[Show]</a>
		<a href="{{route('post.edit',$post['id'])}}">[Edit]</a>
	</li>
	@empty
	<li>No data</li>
	@endforelse
</ul>
<a href="{{route('hello')}}">Go to Hello</a>
@endsection

@section("script")
<script type="text/javascript">
	function search(q){
		$("#loading").text("Loading...");
		$.get('{{route('post.index')}}?q='+q,function(res){
			var posts = "";
			$.each(res.payload,function(index,post){
				// console.log(post);
				posts += render(post);
			});
			$('#posts').html(posts);
			$("#loading").text("");
			console.log(posts);
		},'json');
	}

	function render(data)
	{
		return "<li>"+
		"<strong>"+data.title+"</strong> - by "+data.user.name+""+
			"<a href=\"{{route('post.index')}}/"+data.id+"\">[Show]</a>"+
			"<a href=\"{{route('post.index')}}/"+data.id+"/edit\">[Edit]</a>"+
		"</li>";
	}
	
</script>
@endsection