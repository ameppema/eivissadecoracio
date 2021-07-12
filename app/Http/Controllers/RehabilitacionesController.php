<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Menu;

class RehabilitacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rehabilitaciones = Module::find(2);
        $gallery = Module::all();
        $menus = Menu::orderBy('sort_order', 'ASC')->get();

        return view('rehabilitaciones', compact(['rehabilitaciones', 'menus', 'gallery']));
    }
}
