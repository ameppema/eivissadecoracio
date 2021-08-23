<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\TranslationController;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\App;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        App::setLocale('es');
        $slide = Slide::all();

        return view('admin.modules.slider', compact(['slide']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = request()->validate([
            'titulo' => ['required', 'string', 'max:255'],
            'titulo' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string', 'max:255'],
            'imagen' => ['required', 'image'],
            'imagen-movil' => ['required', 'image'],
        ]);

        $filename = $request->file('imagen')->getClientOriginalName();
        $filenamemobile = $request->file('imagen-movil')->getClientOriginalName();

        $rutaImg = $request['imagen']->storeAs('slide', $filename, 'public');
        $rutaImgMovil = $request['imagen-movil']->storeAs('slide', $filenamemobile, 'public');

        $row_id = DB::table('slides')->insertGetId([
            'titulo'    => $datos['titulo_en'],
            'descripcion'=> $datos['descripcion_en'],
            'locale'=> 'en',
            'imagen'    => $rutaImg,
            'imagen_movil'    => $rutaImgMovil
        ]);
        $i = 0;
        $atttributes = ['titulo', 'descripcion'];
        $translations = [$datos['titulo_en'],$datos['descripcion_en']];
        foreach($translations as $translation){
            (new TranslationController)->store($translation, 'slides',$atttributes[$i++], $row_id, 'en');
        }
        $i=null;

        return redirect()->route('admin.slide');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        App::setLocale('es');
        //Devuelve la informacion al modal
        $slide = Slide::find($id);
        return $slide;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slide $slide)
    {
        App::setLocale('es');
        $datos = request();
        $slide->titulo = $datos['titulo'];
        $slide->descripcion = $datos['descripcion'];   

        if(request('imagenNueva'))
        {
            Storage::delete('public/' . $slide->imagen);

            $filename = $request->file('imagenNueva')->getClientOriginalName();
            $rutaImgMovil = $request['imagenNueva']->storeAs('slide', $filename, 'public');

            $slide->imagen = $rutaImgMovil;
        }
        if(request('imagenMovilNueva'))
        {
            Storage::delete('public/' . $slide->imagen_movil);
            $filenamemobile = $request->file('imagenMovilNueva')->getClientOriginalName();
            $rutaImgMovilNueva = $request['imagenMovilNueva']->storeAs('slide', $filenamemobile,  'public');
            $slide->imagen_movil = $rutaImgMovilNueva;
        }

        $slide->save();

        $columns = ['titulo', 'descripcion'];
        $translations = [$datos['titulo_en'] ,$datos['descripcion_en']];
        for($i = 0; $i < count($columns); $i++){
            (new TranslationController)->update($columns[$i],$translations[$i],$slide->id,'slides');
        }

        return redirect()->route('admin.slide');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slide::find($id);

        if(Storage::delete('public/' . $slide->imagen)){
            Slide::destroy($id);
            (new TranslationController)->destroy($id, 'slides');
            return redirect()->route('admin.slide');
        }
        (new TranslationController)->destroy($id, 'slides');
        Slide::destroy($id);
        return redirect()->route('admin.slide');
    }
}
