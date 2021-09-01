<?php

namespace App\Http\Controllers;

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
        return view('admin.modules.roles', compact(['permissionsCRUD','rolesAll']));
    }

    public function updateByAjax(Request $request){
        $inputData = json_decode($request->data);
        if(isset($inputData->role)){
            $role = Role::where('name',$inputData->role)->first();
            if($inputData->isChecked == true){
                $role->givePermissionTo($inputData->permission);
            }else{
                $role->revokePermissionTo($inputData->permission);
            }
        }
        return response()->json(json_encode($inputData));
    }
}
