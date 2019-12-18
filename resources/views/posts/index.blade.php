@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <h1>Posts</h1>
    @if(count($posts)>0)
    <ul class="list-group">
        @foreach ($posts as $post)
        <div class="well">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
                </div>
                <div class="col-md-4 col-sm-4">
                    <h2><li class="list-group-item"><a href="{{route('posts.show', ['id' => $post->id]) }}"> {{$post->title}} </a></h2>
                        <small>Posted on {{$post->created_at}} By: {{$post->user->name}}</small></li>
                </div>
                </div>
            </div>
            <br>
        @endforeach
    </ul>

    

    {{$posts->links()}}
    @else 
        <p> No Posts Found </p>
    @endif
@endsection