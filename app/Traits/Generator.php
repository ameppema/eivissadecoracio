<?php
namespace App\Traits;

use Illuminate\Support\Facades\DB;

Trait Generator
{
    public function CreateRegister($table,$props){
        $generated = DB::table($table)
                            ->insert($props);
        if($generated){
            return 1;
        }
    }
    public static function CreateTranslationRegisters($props, $repetitions){
    for($i = 0; $i < count($repetitions); $i++){
        foreach($props as $prop){
            DB::table('translations')
                ->insert([
                    'table'=>'modules',
                    'column'=> $prop,
                    'row_id'=> $repetitions[$i],
                    'locale'=> 'en',
                    'translation'=>'Some Text test',
                ]);
        }
    }
    }

    public static function DeleteTranslationRegisters(){
        $deleted = DB::table('translations')
                    ->where('table','modules')
                    ->delete();
    }
}

/*
ModuleTranlationColumn = [
    'titulo',
    'subtiutlo',
    'texto_principal',
    'texto_secundario',
    'texto_tercero',
]
ModuleTranlationRow_id = [
    1,2,3,4,5,6
]
*/