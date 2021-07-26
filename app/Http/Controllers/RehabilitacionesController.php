<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Galleries;

class RehabilitacionesController extends Controller
{
    public function index(){
        $content = Content::getContent('rehabilitaciones');
        $galleryOne = Galleries::page(2)->gallery(1)->get();
        $galleryTwo = Galleries::page(2)->gallery(2)->get();
        $menu = Content::getMenu();

        return view('page', compact(['content', 'menu', 'galleryOne', 'galleryTwo']));
    }
}