<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Traits\Generator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class GeneratorController extends Controller{
    use Generator;

    public function CreateRolesPermisions(){
                /* Roles */
                $roleAdmin = Role::create(['name'=>'Admin']);
                $roleEditor = Role::create(['name'=>'Editor']);
                $roleGuest = Role::create(['name'=>'Guest']);
                $roleEspecial = Role::create(['name'=>'Especial']);
        
                /* Actions Permissions */
                Permission::create(['name'=>'create'])->assignRole($roleAdmin);
                Permission::create(['name'=>'read'])->assignRole($roleAdmin);
                Permission::create(['name'=>'update'])->assignRole($roleAdmin);
                Permission::create(['name'=>'delete'])->assignRole($roleAdmin);
        
                /* Routes Permissions */
                Permission::create(['name'=>'admin.menu'])->assignRole($roleAdmin);
                Permission::create(['name'=>'admin.slider'])->assignRole($roleAdmin);
                Permission::create(['name'=>'admin.historia'])->assignRole($roleAdmin);
                Permission::create(['name'=>'admin.obras'])->assignRole($roleAdmin);
                Permission::create(['name'=>'admin.rehabilitaciones'])->assignRole($roleAdmin);
                Permission::create(['name'=>'admin.cocinas'])->assignRole($roleAdmin);
                Permission::create(['name'=>'admin.interiores'])->assignRole($roleAdmin);
                Permission::create(['name'=>'admin.parquets'])->assignRole($roleAdmin);
                Permission::create(['name'=>'admin.partners'])->assignRole($roleAdmin);
                Permission::create(['name'=>'admin.roles'])->assignRole($roleAdmin);
                Permission::create(['name'=>'admin.premisos'])->assignRole($roleAdmin);
                Permission::create(['name'=>'admin.perfil'])->assignRole($roleAdmin);   

                // \App\Models\User::create(['name'=>'Test User','email'=>'test@test.com','password'=> Hash::make('12345678')])->assignRole('Admin');
                
                return redirect()->route('admin.home');
    }

    public function CreateTranslation(){
        $translation = DB::table('translations')->where('table','pages')->get();
        if(count($translation)){
            return 'already created';
        }
        $text = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis ante consectetur, malesuada ex varius, ornare turpis. Nam ex diam, commodo eu lorem vitae, ullamcorper malesuada libero. In hac habitasse platea dictumst.(ENG)';
        $ModuleTranlationColumn = [
            'titulo',
            'subtitulo',
            'texto_principal',
            'texto_secundario',
            'texto_tres',
        ];
        $ModuleTranlationRow_id = [
            1,2,3,4,5,6
        ];
        $this->CreateTranslationRegisters($ModuleTranlationColumn, $ModuleTranlationRow_id, $text);
        return back();
    }
    public function DeleteTranslation(){
        $this->DeleteTranslationRegisters();
        return back();
    }
}