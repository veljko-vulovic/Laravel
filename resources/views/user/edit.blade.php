@extends('layouts.app')

@section('content')
    <div class="container pt-5">
        <h1>User </h1>
        <form class="p-5" method="POST" action="{{route('users.update',$user)}}">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="exampleInputName1">Full Name</label>
                <input type="text" class="form-control" id="exampleInputName1" name="user_name" placeholder="Full Name"
                       value="{{$user->name}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       name="email"  placeholder="Enter email" value="{{$user->email}}">
            </div>
            <div class="form-group">
                <label for="exampleInputRole">Role</label>
                @foreach($roles as $role)
                    <div class="form-check">
                        <input name="roles[]" @if(in_array($role->id, $active_roles)){{'checked'}}@endif type="checkbox" class="form-check-input" value="{{$role->id}}" id="{{$role->role_name}}">
                        <label class="form-check-label" for="{{$role->role_name}}">{{$role->role_name}}</label>
                    </div>
                @endforeach
            </div>
            <button type="submit" class=" mt-2 btn btn-primary">Save</button>
        </form>
    </div>
@endsection
