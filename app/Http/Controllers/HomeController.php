<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\SlideController;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Service;

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
        $services = Service::all();

        return view('home')->with(['slider' => $slider, 'services' => $services]);
    }
}
