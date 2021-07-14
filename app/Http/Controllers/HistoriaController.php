<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Content;

class HistoriaController extends Controller
{
    public function index(){
        $content = Content::getContent('historia');
        $gallery = Content::getGallery();
        $menus = Content::getMenu();


        return view('page',compact(['content', 'gallery', 'menus']));
    }
}
