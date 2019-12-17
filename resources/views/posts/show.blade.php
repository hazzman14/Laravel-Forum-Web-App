@extends('layouts.app')

@section('title', 'Post Details')

@section('content')
        <a href="/posts" class="btn btn-secondary"> Back</a>
        <ul class="list-group">
                <li class="list-group-item"> <h1> Title: {{ $post->title }} </h1> </li>
                <li class="list-group-item"> <h2> Body: {{ $post->body }} </h2> </li>  
                <li class="list-group-item"> Post ID: {{ $post->id }} </li>
                
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
                                </form>
<hr>
                        <a href="/posts/{{$post->id}}/edit" class="btn btn-secondary"> Edit</a>

                                <hr>
                               
                        @endif
                @endif
@endsection