@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
<h1> Edit Post </h1>
<form method="POST" action="{{route('posts.store')}}">
@csrf
<ul class="list-group">
    <li class="list-group-item"> <h1> Title: <input type="text" name="title" 
        value="{{$post->title}}"></h1> </li>

    <li class="list-group-item"> <h1> Body: <input type="text" name="body" 
        value="{{$post->body}}"></h1> </li>


</ul>



<input type="submit" value="Submit" class="btn btn-primary">
<a href="{{route('posts.index')}}" class="btn btn-secondary">Cancel</a>
</form>

@endsection


