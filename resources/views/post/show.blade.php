@extends('layouts.main')

@section('title')
{{$post->title}}
@endsection

@section('content')
<h1>{{$post->title}}</h1>
<p>{{$post->content}}</p>
<a href="{{route('post.index')}}">[Back]</a>
<form method="post" action="{{route('post.destroy',$post->id)}}">
	{{ csrf_field() }}
	{{ method_field("delete") }}
	<button onclick="return confirm('Do you want to delete?');" type="submit">Delete</button>
</form>
@endsection