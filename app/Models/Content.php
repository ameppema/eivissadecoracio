<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Menu;
use App\Models\Module;

class Content extends Model
{
    use HasFactory;

    public static function getMenu(){
        return Menu::orderBy('sort_order', 'ASC')->get();
    }

    public static function getContent($page){
        $content = DB::table('Modules')
        ->join('category_menu', 'modules.category_menu_id', '=', 'category_menu.id')
        ->where('enlace', $page)
        ->first();

        return $content;
    }

    /**
     * Muestra los servicios en HomePage
     * @method static App\Models\Content get(string except)
     */

    public static function getServices(){
        $content = DB::table('modules')
                        ->where('enlace','NOT LIKE','historia')
                        ->get();

        return $content;
    }
    
    public static function getGallery(){
        return Module::all();
    }
}