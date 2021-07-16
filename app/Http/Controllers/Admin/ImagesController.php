<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Images;
use Illuminate\Http\Request;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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

        return redirect()->route('admin.home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function show(Images $images)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function edit(Images $images)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Images $images)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function destroy(Images $images)
    {
        //
    }
}
