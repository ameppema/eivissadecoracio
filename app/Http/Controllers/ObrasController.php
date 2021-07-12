<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Service;

class ObrasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        $services = Service::all();
        $obras = $services->first();

        return view('obras', compact('obras', 'services', 'menus'));
    }
}
