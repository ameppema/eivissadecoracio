<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    private $onlyCRUDpermissions;
    public function __construct()
    {
        $this->middleware(['can:admin.roles']);
        $this->onlyCRUDpermissions = ['read','update','create','delete'];
    }
    public function index(Request $request)
    {
        $rolesAll = Role::all()->pluck('name');
        $permissionsCRUD = Permission::whereIn('name',$this->onlyCRUDpermissions)->get();
        return view('admin.modules.roles', compact(['permissionsCRUD','rolesAll']));
    }

    public function updateByAjax(Request $request){
        $inputData = json_decode($request->data);
        if(isset($inputData->role)){
            if($inputData->role === 'Admin') return response()->json(json_encode($inputData));
            $role = Role::where('name',$inputData->role)->first();
            if($inputData->isChecked == true){
                if($inputData->permission == 'all'){
                    $role->givePermissionTo($this->onlyCRUDpermissions);
                    return response()->json(json_encode($inputData));
                }
                $role->givePermissionTo($inputData->permission);
            }else{
                if($inputData->permission == 'all'){
                    $role->revokePermissionTo($this->onlyCRUDpermissions);
                    return response()->json(json_encode($inputData));
                }
                $role->revokePermissionTo($inputData->permission);
            }
        }
        return response()->json(json_encode($inputData));
    }
}
