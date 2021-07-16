<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Galleries extends Model
{
    use HasFactory;

    private static $_this = null;
    private static $_id = null;
    public $msg;
    public $_galleryAll;

    public function getImages(){
        return $this->hasMany('App\Models\Images', 'gallery_id', 'id');
    }

    public static function getGallery($gallery_type = 1){
        $gallery = DB::table('images')
                        ->join('galleries', 'galleries.id', '=', 'images.gallery_id', 'right')
                        ->where('images.gallery_id', '=' , $gallery_type)->get();

        return $gallery;
    }

    /* En teoria esto me regresa una instancia - Si lo hace */
    public static function page(int $id){
        self::$_id = $id;
        return self::$_this = new self;
    }



    public function gallery($gallery_type = false){
        $gallery = DB::table('images')
        ->join('galleries','images.gallery_id', '=', 'galleries.id')
        ->where('images.gallery_id', '=' , self::$_id);

        if($gallery_type !== false){
            $gallery->where('images.gallery_type', '=' , $gallery_type);
        }

        $this->_galleryAll = $gallery->get();
        return $this;
    }

    public function please(){
        return $this->_galleryAll;
    }
}


/* $gallery = Galleries::find(5);
$img = $gallery->getImages;

dd($img); */