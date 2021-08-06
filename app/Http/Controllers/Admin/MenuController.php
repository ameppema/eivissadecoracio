<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = $menu = Menu::orderBy('sort_order', 'ASC')->get();;
        return view('admin.modules.menu', compact('menu'));
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
            'nombre' => ['required']
        ]);

        $datos['ruta'] = $datos['ruta'] ?? '#' ;

        Menu::create([
            'nombre' => strtolower($datos['nombre']),
            'ruta' => strtolower($datos['nombre']),
        ]);

        return redirect('admin/category_menu');
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
        Menu::where('id','=',$request['id'])->update(['nombre' => $request['nombre']]);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu,  $id)
    {
        Menu::destroy($id);
        return redirect('admin/category_menu');
    }
}
