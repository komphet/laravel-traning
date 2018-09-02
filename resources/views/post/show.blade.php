@extends('layouts.main')

@section('title')
Post Show {{$id}}
@endsection

@section('content')
<h1>Show Post {{$id}}</h1>
<p>This is a show post</p>
<a href="{{route('post.index')}}">[Back]</a>
<form method="post" action="{{route('post.destroy',1)}}">
	{{ csrf_field() }}
	{{ method_field("delete") }}
	<button type="submit">Delete</button>
</form>
@endsection