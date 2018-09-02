@extends('layouts.main')

@section('title')
Post List
@endsection

@section('content')
<a href="{{route('post.create')}}">[Create Post]</a>
@include('post.sidebar')
<ul>
	@forelse($posts as $index => $value)
	<li>
		{{$value['title']}}
		@{{test}}
		<a href="{{route('post.show',$value['id'])}}">[Show]</a>
		<a href="{{route('post.edit',$value['id'])}}">[Edit]</a>
	</li>
	@empty
	<li>No data</li>
	@endforelse
</ul>
<a href="{{route('hello')}}">Go to Hello</a>
@endsection