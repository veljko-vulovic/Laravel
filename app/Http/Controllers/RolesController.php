<?php

namespace App\Http\Controllers;

use App\Models\Roles;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Roles $roles)
    {
        return view('role.index', ['roles' => Roles::all()]);

    }

    public function show(Roles $role)
    {
        return view('role.show')->with(['role' => $role]);
    }
}
