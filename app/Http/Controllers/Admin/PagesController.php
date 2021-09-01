<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\TranslationController;
use App\Models\Pages;
use App\Models\Menu;
use App\Models\Galleries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{
    public function index(Request $request, $param, $id){
        App::setLocale('es');
        $module_name = $param;
        $isModule = Pages::select('id')->where('id', '=', $id )->first();
        if(!$isModule){
            return redirect()->route('admin.home');
        }
        $module = Menu::find($id)->getPage;

        $galleryOne = Galleries::page($id)->gallery(1)->get();
        $galleryTwo = Galleries::page($id)->gallery(2)->get();

        return view('admin.modules.template', compact(['module_name', 'module', 'galleryOne', 'galleryTwo']));
    }

    public function store(Request $request,$name)
    {
        $datos = request()->validate([
            'titulo' => ['required', 'string', 'max:255'],
            'subtitulo' => ['required', 'string', 'max:255'],
            'imagen-principal' => ['required', 'image'],
            'first_text' => ['required', 'string'],
            'second_text' => ['required', 'string'],
            'third_text' => ['required', 'string']
        ]);

        $rutaImg = $request['imagen_principal']->store('moduleImg', 'public');
        $rutaImgMovil = $request['imagen_movil']->store('moduleImg', 'public');

        DB::table('pages')->insert([
            'titulo'        => $datos['titulo'],
            'subtitulo'     => $datos['subtitulo'],
            'imagen_principal'=> $rutaImg,
            'imagen_movil'   => $rutaImgMovil,
            'fisrt_text'    => $datos['first_text'],
            'second_text'   => $datos['second_text'],
            'third_text'    => $datos['third_text'],
        ]);

        return redirect()->back();
    }

    public function update(Request $request, Pages $module, $name, $id)
    {
        if ($request->user()->cannot('update', $module)) {
            abort(403);
        }
        $module =  Pages::find($id);

        $datos = request()->validate([
            'titulo' => ['required', 'string', 'max:255'],
            'subtitulo' => ['required', 'string', 'max:255'],
            'first_text' => ['required', 'string'],
            'second_text' => ['required', 'string'],
            'third_text' => ['required', 'string'],
            'titulo_en' => ['required', 'string'],
            'subtitulo_en' => ['required', 'string'],
            'first_text_en' => ['required', 'string'],
            'second_text_en' => ['required', 'string'],
            'third_text_en' => ['required', 'string'],
        ]);
  
        $module->titulo = $datos['titulo'];
        $module->subtitulo = $datos['subtitulo'];
        $module->texto_principal = $datos['first_text'];
        $module->texto_secundario = $datos['second_text'];
        $module->texto_tres = $datos['third_text'];

        if(request('imagen-principal'))
        {
            Storage::delete('public/' . $module->imagen_principal);

            $filename = $request->file('imagen-principal')->getClientOriginalName();

            $rutaImgNueva = $request['imagen-principal']->storeAs('slide', $filename, 'public');
        
            $module->imagen_principal = $rutaImgNueva;
        }
        if(request('imagen_movil'))
        {
            Storage::delete('public/' . $module->imagen_movil);

            $filenamemobile = $request->file('imagen_movil')->getClientOriginalName();

            $rutaImgNueva = $request['imagen_movil']->storeAs('slide', $filenamemobile, 'public');

            $module->imagen_movil = $rutaImgNueva;
        }

        $module->save();
        $props = ['titulo','subtitulo','texto_principal','texto_secundario','texto_tres'];
        $translations = [$datos['titulo_en'], $datos['subtitulo_en'], $datos['first_text_en'], $datos['second_text_en'], $datos['third_text_en']];
        for($i = 0; $i < count($props); $i++){
            (new TranslationController)->update($props[$i],$translations[$i], $id,'pages');
        }

        return redirect()->back()->with(['success'=>'Informacion Actualizada Exitosamente']);
    }
}
