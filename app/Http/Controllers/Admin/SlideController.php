<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\TranslationController;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\App;
use League\CommonMark\Extension\Attributes\Node\Attributes;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        App::setLocale('en');
        $slide = Slide::all();
        $slide_en = Slide::all();
        $translation = DB::table('translations')
        ->where('table', 'slide')
        ->get(['column', 'translation']);
        $trans = Slide::all();

        return view('admin.modules.slider', compact(['slide', 'slide_en']));
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
            'titulo_en' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string', 'max:255'],
            'descripcion_en' => ['required', 'string', 'max:255'],
            'imagen' => ['required', 'image'],
            'imagen-movil' => ['required', 'image'],
        ]);

        $filename = $request->file('imagen')->getClientOriginalName();
        $filenamemobile = $request->file('imagen-movil')->getClientOriginalName();

        $rutaImg = $request['imagen']->storeAs('slide', $filename, 'public');
        $rutaImgMovil = $request['imagen-movil']->storeAs('slide', $filenamemobile, 'public');

        $row_id = DB::table('slide')->insertGetId([
            'titulo'    => $datos['titulo_en'],
            'descripcion'=> $datos['descripcion_en'],
            'locale'=> 'en',
            'imagen'    => $rutaImg,
            'imagen_movil'    => $rutaImgMovil
        ]);
        $i = 0;
        $atttributes = ['titulo', 'descripcion'];
        $translations = [$datos['titulo'],$datos['descripcion']];
        foreach($translations as $translation){
            (new TranslationController)->store($translation, 'slide',$atttributes[$i++], $row_id, 'es');
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
        $translations = [$datos['titulo_es'] ,$datos['descripcion_es']];
        for($i = 0; $i < count($columns); $i++){
            (new TranslationController)->update($columns[$i],$translations[$i],$slide->id);
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
            (new TranslationController)->destroy($id);
            return redirect()->route('admin.slide');
        }
        (new TranslationController)->destroy($id);
        Slide::destroy($id);
        return redirect()->route('admin.slide');
    }
}
