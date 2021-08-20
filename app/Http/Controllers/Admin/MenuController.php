<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\TranslationController;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        App::setLocale('es');
        $menu = $menu = Menu::orderBy('sort_order', 'ASC')->get();
        return view('admin.modules.menu', compact(['menu']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => ['required'],
            'nombre_en' => ['required']
        ]);

        $datos['ruta'] = $datos['ruta'] ?? 'index' ;

        $newMenu = Menu::create([
            'nombre' => strtolower($datos['nombre']),
            'ruta' => strtolower($datos['ruta']) ?? 'index',
        ]);

        (new TranslationController)->store($datos['nombre_en'],'category_menu','nombre',$newMenu->id,'en');

        return redirect()->route('admin.menu');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        Menu::where('id',$request['id'])->update(['nombre' => $request['menu_nombre-es']]);
        (new TranslationController)->update('nombre', $request['menu_nombre-en'], $request['id']);
        return redirect('admin/category_menu');
    }
    public function sortMenu(Request $request, Menu $menu)
    {
        $data = json_decode($request->data);
        $menu = Menu::orderBy('sort_order', 'ASC')->get();
        $i = 0;
        foreach($menu as $itemMenu)
        {   
            Menu::where('id', '=', $data[$i]->id)->update(array('sort_order' => $data[$i]->index));
            $i++;
        }
        $i=null;
        $newOrder = Menu::orderBy('sort_order', 'ASC')->get();

        return response(json_encode($newOrder),201);
    }
    public function getDataByAjax($id){
        App::setLocale('es');
        $menu = Menu::find($id);
        return $menu;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu,  $id)
    {
        Menu::destroy($id);
        (new TranslationController)->destroy($id);
        return redirect()->route('admin.menu');
    }
}
