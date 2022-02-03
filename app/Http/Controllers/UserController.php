<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Mail\UserEditMail;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return User[]|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index', ['users' => User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.show')->with(['user' => $user, 'roles' => Roles::all()]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Roles::all();
        $active_roles = [];

        foreach ($user->roles as $role) {
            $active_roles[] = $role->id;
        }


        return view('user.edit')->with(
            [
                'user' => $user,
                'roles' => $roles,
                'active_roles' => $active_roles,
            ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $input = $request->all();
        $user->name       = $input['user_name'];
        $user->email      = $input['email'];
        $user->roles()->sync($input['roles']);
        $user->save();

        $details['to'] = 'veljko.vulovic@quantox.com';
        $details['name'] = 'Veljko Vulovic Dev';
        $details['subject'] = 'User Update';
        $details['message'] = 'User with id : '.$user->id.' was updated successfully!';
        $details['message'] .="<br>User Name : ".$user->name;
        $details['message'] .="<br>User Email : ".$user->email;
        $details['message'] .="<br>User Roles :<br>";

        foreach ($input['roles'] as $role_id):
            $details['message'] .= Roles::find($role_id)->role_name.'<br>';
        endforeach;

        SendEmailJob::dispatch($details);

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
