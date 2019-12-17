@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <h1>Posts</h1>

    <ul class="list-group">
        @foreach ($posts as $post)
        <div class="card card-body bg-light">
            <h2><li class="list-group-item"><a href="{{route('posts.show', ['id' => $post->id]) }}"> {{$post->title}} </a></h2>
            <small>Posted on {{$post->created_at}} By: {{$post->user->name}}</small>
                 </li>
                </div>
        @endforeach
    </ul>

    {{$posts->links()}}
    
@endsection