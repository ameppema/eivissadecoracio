<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Galleries;

class ParquetsController extends Controller
{
    public function index(){
        $content = Content::getContent('parquets');
        $galleryOne = Galleries::page(5)->gallery(1)->get();
        $galleryTwo = Galleries::page(5)->gallery(2)->get();
        $menu = Content::getMenu();

        return view('page', compact(['content', 'menu', 'galleryOne', 'galleryTwo']));
    }
}