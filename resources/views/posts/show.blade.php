@extends('layouts.app')

@section('title', 'Post Details')

@section('content')

<ul>
        <li> <h1> Title: {{ $post->title }} </h1> </li>
        <li> <h2> Body: {{ $post->body }} </h2> </li>  
        <li> Post ID: {{ $post->id }} </li>
        <li> User ID: {{ $post->user_id }} </li>
        <li> Created on: {{ $post->created_at }} By: {{$post->user->name}} </li>
            
</ul>
<hr>
<form method="POST"
        action="{{route('posts.destroy',['id' => $post->id])}}">

        @csrf 
        @method('DELETE')
        <button type="submit">Delete</button>
</form>
<hr>
<p><a href="{{route('posts.index')}}">Back</a></p>

@endsection