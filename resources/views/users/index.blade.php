@extends('layouts.app')

@section('title', 'Users')

@section('content')
<p> User list: </p>

<ul>
    @foreach ($users as $user)
        <li><a href="{{route('users.show', ['id' => $user->id]) }}"> {{$user->name}} </a></li>
    @endforeach
    
</ul>
{{$users->links()}}
@endsection