<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Service;

class InterioresController extends Controller
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
        $interiores = $services->find(3);

        return view('interiores', compact('interiores', 'services', 'menus'));
    }
}
