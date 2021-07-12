<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Menu;
use App\Models\Module;
use Illuminate\Support\Facades\DB;

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
        $modules = Module::all();
        $menus = Menu::orderBy('sort_order', 'ASC')->get();

        $dumps = DB::table('Modules')
                ->join('category_menu', 'modules.category_menu_id', '=', 'category_menu.id')
                ->get();

        // dd($dumps);
        // die();
        return view('home', compact(['slider', 'modules', 'menus']));
    }
}
