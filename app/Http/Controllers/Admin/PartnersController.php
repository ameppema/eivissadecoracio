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
        $gallery = Galleries::page(7)->gallery()->inOrder('desc')->get();

        return view('admin.modules.partner', compact(['gallery', 'partnerData']));
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partners  $partners
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partners $partners, int $id = 1)
    {
        $partners = Partners::find($id);
        $data = $request->validate([
            'titulo' => ['nullable', 'string'],
            'subtitulo' => ['nullable', 'string']
        ]);

        $partners->titulo = $data['titulo'];
        $partners->subtitulo = $data['subtitulo'];

        $partners->save();

        return back();
    }

    /**
     * Reordered the specified resource from BD.
     *
     * @param  \App\Models\Partners  $partners
     * @return \Illuminate\Http\Response
     */
    public function editOrderByAjax(Request $request, Images $images)
    {
        $data = json_decode($request->data);
        $images = Galleries::page(7)->gallery()->inOrder('desc')->get();
        $i = 0;
        foreach($images as $itemMenu)
        {   
            Images::where('id', '=', $data[$i]->id)->update(array('sort_order' => $data[$i]->index));
            $i++;
        }
        $i=null;
        $newOrder = Galleries::page(7)->gallery()->inOrder()->get();

        return response(json_encode($newOrder),201);
    }
}
