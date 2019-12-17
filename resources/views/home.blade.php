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
                    <li class="list-group-item"> <h2>{{$post->title}}</h2> </li>
                        <form method="POST"
        action="{{route('posts.destroy',['id' => $post->id])}}">

        @csrf 
        @method('DELETE')
        <button type="submit">Delete</button>
</form>
                    @endforeach
</ul>
                   

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
