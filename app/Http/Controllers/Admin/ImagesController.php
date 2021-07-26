<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'imagen_src' => ['required','image'],
            'gallery_id' => ['required','numeric'],
            'gallery_type' => ['required','numeric'],
            'imagen_alt' => ['string','nullable']
        ]);

        $filename = $request->file('imagen_src')->getClientOriginalName();

        $rutaImg = $request['imagen_src']->storeAs('gallery', $filename, 'public');

        Images::create([
            'image_src' => $rutaImg,
            'image_alt' => $data['imagen_alt'],
            'gallery_type' => $data['gallery_type'],
            'gallery_id' => $data['gallery_id'],
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */

    public function editByAjax($image)
    {
        return Images::find($image);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Images $images,int $id)
    {
        $images = Images::find($id);
        $data = $request->validate([
            'nueva_imagen_src' => ['nullable','image'],
            'nueva_imagen_alt' => ['nullable', 'string'],
        ]);
        
        if(isset($data['nueva_imagen_src'])){

            Storage::delete('public' . $images->image_src);
            
            $filename = $request->file('nueva_imagen_src')->getClientOriginalName();

            $rutaImgNueva = $request['nueva_imagen_src']->storeAs('gallery', $filename, 'public');

            $images->image_src = $rutaImgNueva;
        }

        $images->image_alt = $data['nueva_imagen_alt'];

        $images->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function destroy(Images $images,int $id)
    {
        $images = Images::find($id);

        if($images){
            Storage::delete('public', $images->image_src);
            $images->delete();
        }

        return back();
    }
}
