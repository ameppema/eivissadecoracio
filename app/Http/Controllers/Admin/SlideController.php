<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slide = DB::select('SELECT * FROM slide');

        return view('admin.modules.slider')->with(['slide' => $slide]);
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

        // Guardar imagen del slide
        $rutaImg = $request['imagen']->store('slide', 'public');
        $rutaImgMovil = $request['imagen-movil']->store('slide', 'public');

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

            $rutaImgNueva = $request['imagenNueva']->store('slide', 'public');

            $slide->imagen = $rutaImgNueva;
        }
        if(request('imagenMovilNueva'))
        {
            Storage::delete('public/' . $slide->imagen_movil);

            $rutaImgMovilNueva = $request['imagenMovilNueva']->store('slide', 'public');

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
    public function destroy(Slide $slide)
    {
        //
    }
}
