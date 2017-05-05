<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Role;
use Illuminate\Support\Facades\DB;
use App\Mail\UserStatusChangeMail;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{
    protected $users;
    protected $user;
    protected $roles;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('active');
        $this->users = User::all();
        $this->roles = Role::all();

    }

    public function index()
    {
        $this->user = Auth::user();
        $user_roles = array();
        foreach ($this->users as $user) {
            foreach ($this->roles as $role) {
                if ($user->hasRole($role->name)) {
                    $user_roles[$user->id][] = $role->display_name;
                }
            }
        }
        return view('admin.user.index',
            [
                'users' => $this->users,
                'roles' => $this->roles,
                'user_roles' => $user_roles
            ]
        );
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'role' => 'required'
        ] );

        $user = new User;

        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->name = $request->name;
        if ($request->active == 'true') {
            $user->active = true;
        } else {
            $user->active = false;
        }

        $user->save();
        $user->attachRole($request->role);

        return redirect('/admin/users');

    }

    public function edit(User $user)
    {
        $user_roles = array();
        foreach ($this->roles as $role) {
            if ($user->hasRole($role->name)) {
                $user_roles[] = $role;
            }
        }
        return view ('admin.user.edit',
            [
                'user' => $user,
                'roles' => $this->roles,
                'user_roles' => $user_roles
            ]
        );
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'active' => 'required'
        ] );

//        echo '<pre>';
//        var_dump($request->all());
//        echo '</pre>';
//        exit();

//        $user->email = $request->email;
//        $user->name = $request->name;
        if ($request->active === "true") {
            $user->active = true;
        } else {
            $user->active = false;
        }

        $user->update();

//        if (!empty($user->roles)) {
//            $user->detachRoles($user->roles);
//        }
        if (!empty($request->remove_role)) {
            $user->detachRole($request->remove_role);
        }

        if (!empty($request->add_role)) {
            if (!$user->hasRole($request->add_role)) {
                $user->attachRole($request->add_role);
            }
        }

//        Mail::to($user)->send(new UserStatusChangeMail($user));
        Mail::to($user)->queue(new UserStatusChangeMail($user));

        return redirect('/admin/users');
    }

}
