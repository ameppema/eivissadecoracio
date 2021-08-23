<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\Generator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GeneratorController extends Controller{
    use Generator;

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