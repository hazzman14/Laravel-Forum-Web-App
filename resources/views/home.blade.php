@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1> Dashboard </h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/posts/create" class="btn btn-primary"> Create New Post</a>
                    <p> </p>
                    <h1> Your Posts: </h1>
                    <ul class="list-group">
                    @foreach ($posts as $post)
                    <li class="list-group-item"><a href="{{route('posts.show', ['id' => $post->id]) }}"> <h2>{{$post->title}}</h2> </li>
                        <form method="POST"
        action="{{route('posts.destroy',['id' => $post->id])}}">

        @csrf 
        @method('DELETE')
        <input type="submit" value="Delete" class="btn btn-danger">
        <a href="/posts/{{$post->id}}/edit" class="btn btn-secondary"> Edit</a>
</form>
                    @endforeach
</ul>

<br>
<h1> Your Comments: </h1>
@foreach ($comments as $comment)
                    <li class="list-group-item"><a href="{{route('posts.show', ['id' => $comment->post->id]) }}"> <h2>{{$comment->comment}}</h2> </li>

                        <form method="POST"
                        action="{{route('comments.destroy',['id' => $comment->id])}}">
                
                        @csrf 
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-danger">
                        <a href="/comments/{{$comment->id}}/edit" class="btn btn-secondary"> Edit</a>
                </form>


                    @endforeach


                    


@endsection
