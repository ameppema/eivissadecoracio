<?php

namespace App\Traits;

use Spatie\Permission\Models\Role;

trait RolesNPermissions 
{
    /**
     * Give or Remove Permission to a Role according to a boolean value ($giveOrRemove)
     * @param  \Spatie\Permission\Models\Permission $permission
     * @param  \Spatie\Permission\Models\Role $role
     * @param  boolean $giveOrRemove
     * @prop $this->specificPermissions array of registered permission names
     * In case the permission is "all" you must define the $specificPermissions property in the class
     */
    public function PermissionHandler($permission,Role $role,$giveOrRemove){
        $permission = $permission != 'all' ? $permission : $this->specificPermissions;
        if($giveOrRemove === true){
            $role->givePermissionTo($permission);
        }else{
            $role->revokePermissionTo($permission);
        }
    }
}