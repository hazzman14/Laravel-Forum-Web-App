@extends('layouts.app')

@section('title', 'Edit Comment')

@section('content')


<h1> Edit Comment </h1>
<form method="POST" action="{{route('comments.update',['id' => $comment->id])}}">
@csrf
<ul class="list-group">
    <li class="list-group-item"> <h1> Comment: <input type="text" name="comment" 
        value="{{$comment->comment}}"></h1> </li>

</ul>



<input type="submit" value="Submit" class="btn btn-primary">
<a href="{{route('posts.index')}}" class="btn btn-secondary">Cancel</a>
</form>


@endsection


