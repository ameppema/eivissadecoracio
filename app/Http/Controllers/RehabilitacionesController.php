<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Content;

class RehabilitacionesController extends Controller
{
    public function index()
    {
        $content = Content::getContent('rehabilitaciones');
        $gallery = Content::getGallery();
        $menus = Content::getMenu();

        return view('page', compact(['content', 'menus', 'gallery']));
    }
}