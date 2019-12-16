@extends('layouts.app')

@section('title', 'Posts')

@section('content')
<p> Post list: </p>

<ul>
    @foreach ($posts as $post)
        <li><a href="{{route('posts.show', ['id' => $post->id]) }}"> {{$post->title}} </a></li>
    @endforeach
</ul>

{{$posts->links()}}
<a href="{{ route('posts.create')}}">Create Post </a>
@endsection