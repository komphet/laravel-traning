@extends('layouts.main')

@section('title')
{{$post->title}}
@endsection

@section('content')
@include('post.message')
<h1>{{$post->title}}</h1>
<p>- by {{$post->user->name}}</p>
<p>{{$post->content}}</p>
<a href="{{route('post.index')}}">[Back]</a>
<form method="post" action="{{route('post.destroy',$post->id)}}">
	{{ csrf_field() }}
	{{ method_field("delete") }}
	<button onclick="return confirm('Do you want to delete?');" type="submit">Delete</button>
</form>
<form method="post" action="{{route('comment.store')}}">
	{{ csrf_field() }}
	<p>Comment Message</p>
	<textarea name="message"></textarea>
	<input type="hidden" name="post_id" value="{{$post->id}}">
	<button type="submit">Save</button>
</form>
====== Comment ========
@forelse($post->comments as $comment)
<ul>
	<li>{{$comment->message}} - by {{$comment->user->name}}</li>
</ul>
@empty
No Comment!
@endforelse
=======================



@endsection