<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Menu;
use App\Models\Galleries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $param, $id){
        $module_name = $param;
        $isModule = Module::select('id')->where('id', '=', $id )->first();
        if(!$isModule)
        {
            return redirect()->route('admin.home');
        }
        $module = Menu::find($id)->getModule;

        $galleryOne = Galleries::page($id)->gallery(1)->get();
        $galleryTwo = Galleries::page($id)->gallery(2)->get();

        return view('admin.modules.template', compact(['module_name', 'module', 'galleryOne', 'galleryTwo']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        DB::table('modules')->insert([
            'titulo'    => $datos['titulo'],
            'subtitulo'=> $datos['subtitulo'],
            'imagen_principal'    => $rutaImg,
            'imagen_movil'    => $rutaImgMovil,
            'fisrt_text'    => $datos['first_text'],
            'second_text'    => $datos['second_text'],
            'third_text'    => $datos['third_text'],
        ]);

        return redirect('admin/modules/' . $name);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module, $name, $id)
    {
        $module =  Module::find($id);

        $datos = request()->validate([
            'titulo' => ['required', 'string', 'max:255'],
            'subtitulo' => ['required', 'string', 'max:255'],
            'first_text' => ['required', 'string'],
            'second_text' => ['required', 'string'],
            'third_text' => ['required', 'string'],
        ]);
  
        $module->titulo = $datos['titulo'];
        $module->subtitulo = $datos['subtitulo'];
        $module->texto_principal = $datos['first_text'];
        $module->texto_secundario = $datos['second_text'];
        $module->texto_tres = $datos['third_text'];

        if(request('imagen-principal'))
        {
            Storage::delete('public/' . $module->imagen_principal);

            //Obteniendo el Nombre Original de la imagen
            $filename = $request->file('imagen-principal')->getClientOriginalName();
            // Guardar imagen del con nombre original
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

        return redirect('admin/module/' . $name . '/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        //
    }
}
