<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Module;
use Illuminate\Support\Facades\DB;

class HistoriaController extends Controller
{
    public function index(){

        $dumps = DB::table('Modules')
        ->join('category_menu', 'modules.category_menu_id', '=', 'category_menu.id')
        ->where('enlace','historia')
        ->get();

        $content = $dumps[0];

        $gallery = Module::all();
        $menus = Menu::orderBy('sort_order', 'ASC')->get();


        return view('page',compact(['content', 'gallery', 'menus']));
    }
}
