@extends('layouts.app')

@section('content')
    <div class="container pt-5">
        <h1>User </h1>
        {{$user->name}}
        <br>
        {{$user->email}}
        <br>
        <br>

        Role:
        <br>
        <br>

        @foreach ($user->roles as $role)
            {{$role->role_name}}
            <br>

        @endforeach
        <br>
        <br>

        <a class="btn btn-primary" href="{{route('users.edit',$user)}}">Edit</a>
    </div>
@endsection
