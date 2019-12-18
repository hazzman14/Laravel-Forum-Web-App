@extends('layouts.app')

@section('title', 'Comments')

@section('content')
<p> Comment list: </p>

<ul>
    @foreach ($comments as $comment)
    <h2><li><a href="{{route('comments.show', ['id' => $comment->id]) }}"> {{$comment->comment}} </a></h2></li>
    @endforeach
    
</ul>
{{$comments->links()}}
@endsection