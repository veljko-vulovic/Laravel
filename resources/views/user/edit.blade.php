<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Home</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('users.index')}}">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('roles.index')}}">Roles</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

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


</body>
</html>
