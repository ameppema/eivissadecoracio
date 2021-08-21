<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\Generator;
use Illuminate\Http\Request;

class GeneratorController extends Controller{
    use Generator;

    public function CreateTranslation(){
        $ModuleTranlationColumn = [
            'titulo',
            'subtiutlo',
            'texto_principal',
            'texto_secundario',
            'texto_tres',
        ];
        $ModuleTranlationRow_id = [
            1,2,3,4,5,6
        ];
        $this->CreateTranslationRegisters($ModuleTranlationColumn,$ModuleTranlationRow_id);
        return back();
    }
    public function DeleteTranslation(){
        $this->DeleteTranslationRegisters();
        return back();
    }
}