<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Galleries;

class InterioresController extends Controller
{
    public function index(){
        $content = Content::getContent('interiores');
        $galleryOne = Galleries::page(3)->gallery(1)->get();
        $galleryTwo = Galleries::page(3)->gallery(2)->get();
        $menu = Content::getMenu();

        return view('page', compact(['content', 'menu', 'galleryOne', 'galleryTwo']));
    }
}