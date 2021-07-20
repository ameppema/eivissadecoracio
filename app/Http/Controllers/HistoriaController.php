<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Galleries;

class HistoriaController extends Controller
{
    public function index(){
        $content = Content::getContent('historia');
        $galleryOne = Galleries::page(6)->gallery(1)->get();
        $galleryTwo = Galleries::page(6)->gallery(2)->get();
        $menus = Content::getMenu();

        return view('page', compact(['content', 'menus', 'galleryOne', 'galleryTwo']));
    }
}