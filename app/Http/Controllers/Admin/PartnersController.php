<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partners;
use App\Models\Content;
use App\Models\Galleries;
use App\Models\Images;
use Illuminate\Http\Request;

class PartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Content::getMenu();
        $partnerData = Partners::all()->first();
        $gallery = Galleries::page(7)->gallery()->belongs('partner')->get();

        return view('admin.modules.partner', compact(['gallery', 'partnerData']));
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
    public function storeImage(Request $request)
    {
        $data = $request->validate([
            'partners_imagen_src' => ['required','image'],
            'partners_imagen_alt' => ['required','image'],
        ]);

        $imgName = $request->file('partners_imagen_src')->getClientOriginalName();

        $imgRoute = $request['partners_imagen_src']->storeAs('gallery', $imgName, 'public');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partners  $partners
     * @return \Illuminate\Http\Response
     */
    public function showImageData(Partners $partners, $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partners  $partners
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partners  $partners
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partners $partners)
    {
        $partners = Partners::find(1);
        $data = $request->validate([
            'titulo' => ['required', 'string'],
            'subtitulo' => ['required', 'string']
        ]);

        $partners->titulo = $data['titulo'];
        $partners->subtitulo = $data['subtitulo'];

        $partners->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partners  $partners
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partners $partners)
    {
        //
    }
}
