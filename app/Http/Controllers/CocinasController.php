<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Menu;

class CocinasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cocinas = Module::find(4);
        $gallery = Module::all();
        $menus = Menu::orderBy('sort_order', 'ASC')->get();

        return view('cocinas', compact(['cocinas', 'menus', 'gallery']));
    }
}
