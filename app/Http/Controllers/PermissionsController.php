<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    private $onlyPagesPermissions;
    public function __construct()
    {
        $this->middleware(['can:admin.premisos']);
        $this->onlyPagesPermissions = Permission::all()->whereNotIn('name',['create','read','update','delete'])->pluck('name');
    }
    public function index(Request $request)
    {
        $rolesAll = Role::all()->pluck('name');
        $permissionsAll = $this->onlyPagesPermissions;
        $permissionsNames = $this->onlyPagesPermissions->all();
        
        return view('admin.modules.permissions', compact(['permissionsAll', 'rolesAll', 'permissionsNames']));
    }

    public function updateByAjax(Request $request){
        $inputData = json_decode($request->data);
        if(isset($inputData->role)){
            if($inputData->role === 'Admin') return response()->json(json_encode($inputData));
            $role = Role::where('name',$inputData->role)->first();
            if($inputData->isChecked === true){
                if($inputData->permission == 'all'){
                    $role->givePermissionTo($this->onlyPagesPermissions->all());
                    return response()->json(json_encode($inputData));
                }
                $role->givePermissionTo($inputData->permission);
            }else{
                if($inputData->permission === 'all'){
                    $role->revokePermissionTo($this->onlyPagesPermissions->all());
                    return response()->json(json_encode($inputData));
                }
                $role->revokePermissionTo($inputData->permission);
            }
        }
        return response()->json(json_encode($inputData));
    }
/*     public function updateByAjax(Request $request){
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
    } */
}
