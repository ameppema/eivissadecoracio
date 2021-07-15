<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Content;

class CocinasController extends Controller
{
    public function index()
    {
        $content = Content::getContent('cocinas');
        $gallery = Content::getGallery();
        $menus = Content::getMenu();

        return view('page', compact(['content', 'menus', 'gallery']));
    }
}