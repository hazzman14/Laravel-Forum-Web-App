@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
<h1> Create Post </h1>
<form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
@csrf
<ul class="list-group">
    <li class="list-group-item"> <h1> Title: <input type="text" name="title" 
        value="{{old('title')}}"></h1> </li>

    <li class="list-group-item"> <h1> Body: <input type="text" name="body" 
        value="{{old('body')}}"></h1> </li>

    <li class="list-group-item"> <h1> File Upload:</h1> <input type="file" name="cover_image" 
            value="{{old('cover_image')}}"> </li>
</ul>



<input type="submit" value="Submit" class="btn btn-primary">
<a href="{{route('home')}}" class="btn btn-secondary">Cancel</a>
</form>

@endsection