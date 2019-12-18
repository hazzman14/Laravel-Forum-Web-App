@extends('layouts.app')

@section('title', 'Post Details')

@section('content')
        <a href="/posts" class="btn btn-secondary"> Back</a>
        <ul class="list-group">
                <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
                <li class="list-group-item"> <h1>{{ $post->title }} </h1> </li>
                <li class="list-group-item"> <h2>{{ $post->body }} </h2> </li>  
                <li class="list-group-item"> Created on: {{ $post->created_at }} By: {{$post->user->name}} </li>
                
        </ul>
                <hr>
                @if(!Auth::guest())
                        @if(Auth::user()->id == $post->user_id)
                                <form method="POST"
                                        action="{{route('posts.destroy',['id' => $post->id])}}">
                                        @csrf 
                                        @method('DELETE')
                                        <input type="submit" value="Delete" class="btn btn-danger">
                                        <a href="/posts/{{$post->id}}/edit" class="btn btn-secondary"> Edit</a>
                                </form>
<hr>
                        

                                <hr>
                               
                        @endif
                @endif
@endsection