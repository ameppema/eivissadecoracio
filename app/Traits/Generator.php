<?php
namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

Trait Generator
{
    public function CreateRegister($table,$props){
        $generated = DB::table($table)
                            ->insert($props);
        if($generated){
            return 1;
        }
    }
    public static function CreateTranslationRegisters($props, $repetitions, $text = false){
    for($i = 0; $i < count($repetitions); $i++){
        foreach($props as $prop){
            if($prop == 'titulo' || $prop == 'subtitulo'){
                DB::table('translations')
                ->insert([
                    'table'=>'pages',
                    'column'=> $prop,
                    'row_id'=> $repetitions[$i],
                    'locale'=> 'en',
                    'translation'=> 'Some Text test',
                ]);
                continue;
            }
            DB::table('translations')
                ->insert([
                    'table'=>'pages',
                    'column'=> $prop,
                    'row_id'=> $repetitions[$i],
                    'locale'=> 'en',
                    'translation'=> $text ?? 'Some Text test',
                ]);
        }
    }
    }

    public function DeleteTranslationRegisters(){
        $deleted = DB::table('translations')
                    ->where('table','pages')
                    ->delete();
    }

    
    public static function giveRole($userName,$roleName){
        $user = User::where('name', $userName)->first();
        $user->assignRole($roleName);
        $user = User::with('roles')->get();
        return $user;
    }
    public static function removeRole($userName,$roleName){
        $user = User::where('name', $userName)->first();
        $user->removeRole($roleName);
        $user = User::with('roles')->get();
        return $user;
    }
    public function givePermissionRole(){
        
    }
    public static function createPermission($permissionName, $role = 'Admin'){
        Permission::create(['name'=> $permissionName])->assignRole($role);
        return Permission::all();
    }
}