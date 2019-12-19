@extends('layouts.app')

@section('title', 'Post Details')

@section('content')
        <a href="/posts" class="btn btn-secondary"> Back</a>
        <ul class="list-group">
                <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
                <li class="list-group-item"> <h1>{{ $post->title }} </h1> </li>
                <li class="list-group-item"> <h1>{{ $post->body }} </h1> </li>  
                <li class="list-group-item"> Created on: {{ $post->created_at }} By: {{ $post->user->name}} </li>
               
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

                @if(Auth::guest())
                        <h1> Login or make an accout to comment! </h1>
                @endif

                @if(!Auth::guest())
                <div class="card">
                        <div class="card-block">
                        <form method="POST" action="/posts/{{$post->id}}/comments">
                                @csrf
                                        <div class="form-group">
                                                <textarea name="comment" placeholder="Type comment here" class = "form-control"></textarea>
                                                </div> 
                                        <div class="form-group">
                                        <button type="submit" class = "btn btn-primary"> Post Comment</button>
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        </div>
                                </form>
                        </div>
                        </div>
                </div>

@endif



<h1>Comments:</h1>
@foreach($post->comments as $comment)
<li class="list-group-item"> <h2>{{ $comment->comment}} </h2> </li> 
<li class="list-group-item"> <small> Written on: {{ $comment->created_at }} By {{ $comment->user->name}}   </small>
@if(!Auth::guest())
@if(Auth::user()->id == $post->user_id or Auth::user()->id == $comment->user_id )
        <form method="POST"
                action="{{route('comments.destroy',['id' => $comment->id])}}">
                @csrf 
                @method('DELETE')
                <input type="submit" value="Delete" class="btn btn-danger">
                @if(Auth::user()->id == $comment->user_id)
                <a href="/comments/{{$comment->id}}/edit" class="btn btn-secondary"> Edit</a>
                @endif
        </form>
        </li> 
<br>
       
@endif
@endif
@endforeach
</ul>
<hr>



@endsection