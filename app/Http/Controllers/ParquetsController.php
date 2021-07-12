<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Menu;

class ParquetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parquets = Module::find(5);
        $gallery = Module::all();
        $menus = Menu::orderBy('sort_order', 'ASC')->get();

        return view('parquets', compact(['parquets', 'menus', 'gallery']));
    }
}
