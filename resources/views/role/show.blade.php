@extends('layouts.app')

@section('content')
    <div class="container pt-5">
        <h1>Role </h1>
        {{$role->role_name}}

        <br>
        <br>

        List of users with this role:
        <br>
        <br>

        @foreach ($role->users as $user)
            {{$user->name}}
            <br>

        @endforeach
        <br>
        <br>

    </div>
@endsection
