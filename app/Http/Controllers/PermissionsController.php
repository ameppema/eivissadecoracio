<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:admin.premisos']);
    }
    public function index(Request $request)
    {
        $userID = User::where('id', $request->user()->id)->first();
        $permissionsAll = Permission::all()->pluck('name');
        
        return view('admin.modules.permissions', compact(['userID', 'permissionsAll']));
    }
}
