<?php

namespace App\Http\Controllers;

use App\Traits\RolesNPermissions;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    use RolesNPermissions;
    private $onlyPagesPermissions;
    private $specificPermissions;
    public function __construct()
    {
        $this->middleware(['can:admin.premisos']);
        $this->onlyPagesPermissions = Permission::all()->whereNotIn('name',['create','read','update','delete'])->pluck('name');
        $this->specificPermissions = $this->onlyPagesPermissions->all();
    }
    public function index(Request $request)
    {
        $rolesAll = Role::all()->pluck('name');
        $permissionsAll = $this->onlyPagesPermissions;
        $permissionsNames = $this->specificPermissions;
        
        return view('admin.modules.permissions', compact(['permissionsAll', 'rolesAll', 'permissionsNames']));
    }

    public function updateByAjax(Request $request){
        $inputData = json_decode($request->data);

        if(!isset($inputData->role) || $inputData->role === 'Admin') return json_encode(["msg"=>"Can't modify Admin Role permissions or Undefined role given","data"=> $inputData]);

        $role = Role::where('name',$inputData->role)->first();
        
        $this->PermissionHandler($inputData->permission, $role, $inputData->isChecked);

        return response()->json(json_encode($inputData));
    }
}
