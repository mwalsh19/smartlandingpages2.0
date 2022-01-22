<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
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
        // create a role
        //$role = Role::create(['name' => 'writer']);

        // create a permission
        //$permission = Permission::create(['name' => 'edit articles']);

        // add permission to role
        // $role = Role::create(['name' => 'editor']);
        // $assign = $role->syncPermissions('edit articles');

        // remove permission from role
        // $role->revokePermissionTo($permission);

        // check user permissions and roles
        // $user = Auth::user();
        // assign user a role
        // $user->assignRole('writer');
        // get user permissions
        // $permissions = $user->permissions;
        // get user roles 
        // $roles = $user->getRoleNames();
        // get all user permissions
        // $permissions_user = $user->getAllPermissions();
        // remove all user permissions
        // $user->syncRoles([]);

        // get all roles with permissions
        // $role_permissions = Role::with('permissions')->get();
        // var_dump(json_encode($role_permissions, JSON_PRETTY_PRINT));
        // var_dump($permissions_user);
        // die(); 
        return view('dashboard.index');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
