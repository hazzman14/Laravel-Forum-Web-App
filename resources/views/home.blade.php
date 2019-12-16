@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/posts/create" class="btn btn-primary"> Create Post</a>
                    <h1> Your Posts </h1>
                    @foreach ($posts as $post)
                         <h2>{{$post->title}}</h2>
                        <form method="POST"
        action="{{route('posts.destroy',['id' => $post->id])}}">

        @csrf 
        @method('DELETE')
        <button type="submit">Delete</button>
</form>
                    @endforeach
                   

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
