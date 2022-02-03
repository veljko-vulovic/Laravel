@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>List of users</h1>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Full Name</th>
                <th scope="col">Role</th>
                <th scope="col">E-mail</th>
                <th scope="col">Edit</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td><a href="{{route('users.show',$user)}}">{{$user->name}}</a></td>
                    <td>
                        @foreach ($user->roles as $role)
                            {{$role->role_name}}
                        @endforeach
                    </td>
                    <td>{{$user->email}}</td>
                    <td><a class="btn btn-primary" href="{{route('users.edit',$user)}}">Edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
