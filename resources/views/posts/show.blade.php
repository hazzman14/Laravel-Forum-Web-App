@extends('layouts.app')

@section('title', 'Post Details')

@section('content')

<ul>
        <li> Post ID: {{ $post->id }} </li>
        <li> User ID: {{ $post->user_id }} </li>
        <li> Title: {{ $post->title }} </li>
        <li> Body: {{ $post->body }} </li>      
</ul>

<form method="POST"
        action="{{route('posts.destroy',['id' => $post->id])}}">

        @csrf 
        @method('DELETE')
        <button type="submit">Delete</button>
</form>
<p><a href="{{route('posts.index')}}">Back</a></p>

@endsection