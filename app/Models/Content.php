<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;
use App\Models\Pages;

class Content extends Model
{
    use HasFactory;

    public static function getMenu(){
        return Menu::orderBy('sort_order', 'ASC')->get();
    }

    public static function getContent($page){
        $content = Pages::where('enlace',$page)->first();
        return $content;
    }

    /**
     * Muestra los servicios en HomePage
     * @method static App\Models\Content get(string except)
     */

    public static function getServices(){
        $content = Pages::where('enlace','NOT LIKE', 'historia')->get();
        return $content;
    }
    
    public static function getGallery(){
        return Pages::all();
    }
}