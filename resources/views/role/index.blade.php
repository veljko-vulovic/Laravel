@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>List of Roles</h1>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Role Name</th>
                <th scope="col">Edit</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($roles as $role)
                <tr>
                    <th scope="row">{{$role->id}}</th>
                    <td><a href="{{route('roles.show',$role)}}">{{$role->role_name}}</a></td>
                    <td><a class="btn btn-primary" href="{{route('roles.edit',$role)}}">Edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
