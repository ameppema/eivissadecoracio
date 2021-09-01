<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:admin.roles']);
    }
    public function index(Request $request)
    {
        $rolesAll = Role::all()->pluck('name');
        $permissionsCRUD = Permission::whereIn('name',['read','update','create','delete'])->get();
        $users = User::with('roles')->get();
        
        return view('admin.modules.roles', compact(['permissionsCRUD','rolesAll', 'users']));
    }

    public function updateByAjax(Request $request){
        $permissions = Permission::whereIn('name',['create','read','update','delete'])->get();
        return response()->json([$request->all(), $permissions]);
    }
}
