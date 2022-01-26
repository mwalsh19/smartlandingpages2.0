<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Activitylog\Models\Activity;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = \Spatie\Permission\Models\Role::all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $this->validator($request->all())->validate();
        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);
        activity()->log('Created New User');

        // assign user a role
        $user->assignRole($request->role);
        activity()->log('Assigned new user a role: ' . $request->role);
   
        return redirect('/users')->with('success', 'User Successfully Created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = \Spatie\Permission\Models\Role::all();
        // get user roles 
        $userRoles = $user->getRoleNames();

        return view('users.edit', compact('user', 'roles', 'userRoles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'is_active' => ['required'],
        ]);

        $userAuth = auth()->user();
        $user = User::findOrFail($id);

        if ($userAuth->id === $user->id) {
            if ($request->role !== $user->getRoleNames()[0]) { 
                return back()->with('error', 'You cannot update your own roles and permissions.');
            }

            if ($request->input('is_active')[0] != $user->is_active) { 
                return back()->with('error', 'You cannot change your own status, please contact administrator.');
            }
        } 

        if ($user->id === 1) {
            if ($request->role !== $user->getRoleNames()[0] || $request->input('is_active')[0] != $user->is_active) { 
                return back()->with('error', 'Admin roles and status cannot be changed.');
            }
        }

        $user->update($validatedData);

        // remove all user permissions
        $user->syncRoles([]);
        // assign user a role
        $user->assignRole($request->role);
       
        return redirect('/users')->with('success', 'User Successfully Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($userId) 
    {
        $userAuth = auth()->user();
        $user = User::findOrFail($userId);
        if ($userAuth->id === $user->id) {
            return redirect('/users')->with('error', 'You cannot delete yourself.');
        } 

        if ($user->id === 1) {
            return redirect('/users')->with('error', 'You cannot delete the main admin user.');
        } 
 
        $user->delete();
        activity()->log('Deleted User');
        return redirect('/users')->with('success', $user->name . ' was removed.');

    }

    public function changePassword()
    {
        $user = auth()->user();
        return view('users.password', compact('user'));
    }

    public function changePasswordStore(Request $request)
    {
        $validatedData = $request->validate([
            'old_password' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'max:255'],
        ]);

        $userAuth = auth()->user();

        if (Hash::check($validatedData['old_password'], $userAuth->password)) {
            User::whereId($userAuth->id)->update(['password' => Hash::make($validatedData['password'])]);
            return redirect('/users')->with('success', 'Password successfully changed. You will need your changed password when you log in next time.');
        } else {
            return back()->with('error', 'Your existing password did not match what you entered.');
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
}
