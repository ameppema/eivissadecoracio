<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
        $users = User::with('roles')->get();
        
        return view('admin.modules.roles', compact(['rolesAll', 'users']));
    }
}
