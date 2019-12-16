@extends('layouts.app')

@section('title', 'Create Post')

@section('content')

<form method="POST" action="{{route('posts.store')}}">
@csrf
<p> User ID: <input type="text" name="user_id" 
    value="{{old('user_id')}}"> </p>
<p> Title: <input type="text" name="title" 
    value="{{old('title')}}"> </p>
<p> Body: <input type="text" name="body" 
    value="{{old('body')}}"> </p>
<input type="submit" value="Submit">
<a href="{{route('posts.index')}}">Cancel</a>
</form>

@endsection