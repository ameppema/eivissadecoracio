<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:admin.premisos']);
    }
    public function index(Request $request)
    {
        $rolesAll = Role::all()->pluck('name');
        $permissionsAll = Permission::all()->whereNotIn('name',['create','read','update','delete'])->pluck('name');
        
        return view('admin.modules.permissions', compact(['permissionsAll', 'rolesAll']));
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
