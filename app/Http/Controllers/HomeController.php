<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\SlideController;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Menu;
use App\Models\Module;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // trayendo el Slide desde el admin
        $slider = Slide::all();
        $services = Module::all();
        $menus = Menu::orderBy('sort_order', 'ASC')->get();

        return view('home', compact(['slider', 'services', 'menus']));
    }
}
