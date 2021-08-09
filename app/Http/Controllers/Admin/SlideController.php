<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Traits\Translation;
use Illuminate\Support\Facades\App;

class SlideController extends Controller
{
    public $table = 'slide';
    public $local = 'es';
    use Translation;
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
        // dd($slide[0]->full_info);

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
        // Validar datos
        $datos = request()->validate([
            'titulo' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string', 'max:255'],
            'imagen' => ['required', 'image'],
            'imagen-movil' => ['required', 'image'],
        ]);

        //Obteniendo el Nombre Original de la imagen
        $filename = $request->file('imagen')->getClientOriginalName();
        $filenamemobile = $request->file('imagen-movil')->getClientOriginalName();

        // Guardar imagen del slide
        $rutaImg = $request['imagen']->storeAs('slide', $filename, 'public');
        $rutaImgMovil = $request['imagen-movil']->storeAs('slide', $filenamemobile, 'public');

        DB::table('slide')->insert([
            'titulo'    => $datos['titulo'],
            'descripcion'=> $datos['descripcion'],
            'imagen'    => $rutaImg,
            'imagen_movil'    => $rutaImgMovil
        ]);

        return redirect('admin/slide');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit(Slide $slide)
    {
        //Devuelve la informacion del modal
        $slide = Slide::find($slide);

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

            //Obteniendo el Nombre Original de la imagen
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

        return redirect('admin/slide');
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

            redirect('admin/slide');

        }

    }

    public function change_key( $array, $old_key, $new_key ) {

        if( ! property_exists( $array, $old_key, ) )
        {
            return $array;
        }
    
        $keys = array_keys( $array );
        $keys[ array_search( $old_key, $keys ) ] = $new_key;
    
        return array_combine( $keys, $array );
    }
}
