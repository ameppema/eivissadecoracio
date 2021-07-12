<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Module;
use App\Models\Menu;

class InterioresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interiores = Module::find(3);
        $gallery = Module::all();
        $menus = Menu::orderBy('sort_order', 'ASC')->get();

        return view('interiores', compact(['interiores', 'menus', 'gallery']));
    }
}