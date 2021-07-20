<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Content;

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
        $slider = Slide::all();
        $modules = Content::getServices();
        $historyImages = Content::getContent('historia');
        $menus = Content::getMenu();

        return view('home', compact(['slider', 'historyImages', 'modules', 'menus']));
    }

}
