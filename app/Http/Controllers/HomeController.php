<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Content;
use App\Models\Galleries;

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
        $menu = Content::getMenu();
        $modules = Content::getServices();
        $historyImages = Content::getContent('historia');
        $partnersImages = Galleries::page(7)->gallery()->inOrder()->get();

        // dd($partnersImages);

        return view('home', compact(['slider', 'historyImages', 'modules', 'menu']));
    }

}
