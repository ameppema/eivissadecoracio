<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Content;

class ObrasController extends Controller
{
    public function index()
    {
        $content = Content::getContent('obras');
        $gallery = Content::getGallery();
        $menus = Content::getMenu();

        return view('page', compact(['content', 'menus', 'gallery']));
    }
}