<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Menu;

class ObrasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obras = Module::find(1);
        $menus = Menu::orderBy('sort_order', 'ASC')->get();

        return view('obras', compact(['obras', 'menus']));
    }
}
