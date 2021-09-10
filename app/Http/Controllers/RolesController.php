<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Traits\RolesNPermissions;

class RolesController extends Controller
{
    use RolesNPermissions;
    private $specificPermissions;

    public function __construct()
    {
        $this->middleware(['can:admin.roles']);
        $this->specificPermissions = ['read','update','create','delete'];
    }
    public function index(Request $request)
    {
        $rolesAll = Role::all()->pluck('name');
        $permissionsCRUD = Permission::whereIn('name',$this->specificPermissions)->get();
        return view('admin.modules.roles', compact(['permissionsCRUD','rolesAll']));
    }

    public function updateByAjax(Request $request){

        $inputData = json_decode($request->data);

        if(!isset($inputData->role) || $inputData->role === 'Admin') return json_encode(["msg"=>"Can't modify Admin Role permissions or Undefined role given","data"=> $inputData]);

        $role = Role::where('name',$inputData->role)->first();
        
        $this->PermissionHandler($inputData->permission, $role, $inputData->isChecked);

        return response()->json(json_encode($inputData));
    }
}
