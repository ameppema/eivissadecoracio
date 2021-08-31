<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Images;
use App\Models\Partners;
use App\Models\Galleries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\TranslationController;

class PartnersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:admin.partners']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        App::setLocale('es');
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
    public function store(Request $request)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partners  $partners
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id = 1)
    {
        $partners = Partners::find($id);
        $data = $request->validate([
            'titulo' => ['nullable', 'string'],
            'subtitulo' => ['nullable', 'string'],
            'titulo_en' => ['nullable', 'string'],
            'subtitulo_en' => ['nullable', 'string']
        ]);

        $partners->titulo = $data['titulo'];
        $partners->subtitulo = $data['subtitulo'];

        $partners->save();

        (new TranslationController)->update('titulo', $data['titulo_en'] , $id,'partners');
        (new TranslationController)->update('subtitulo', $data['subtitulo_en'] , $id,'partners');

        return back()->with(['success'=>'!Informacion Actuzalizada!']);
    }

    /**
     * Reordered the specified resource from BD.
     *
     * @param  \App\Models\Partners  $partners
     * @return \Illuminate\Http\Response
     */
    public function editOrderByAjax(Request $request)
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
