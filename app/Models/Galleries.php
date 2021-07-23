<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Galleries extends Model
{
    use HasFactory;

    private static $_this = null;
    private static $gallery_id = null;
    public $msg;
    public $_galleryAll;

    public function getImagesAll(){
        return $this->hasMany('App\Models\Images', 'gallery_id', 'id');
    }

    public static function page(int $id){
        self::$gallery_id = $id;
        return self::$_this = new self;
    }

    public function gallery($gallery_type = false){
        $gallery = DB::table('images')
        ->join('galleries','images.gallery_id', '=', 'galleries.id')
        ->where('images.gallery_id', '=' , self::$gallery_id);

        if($gallery_type !== false){
            $gallery->where('images.gallery_type', '=' , $gallery_type);
        }

        $this->_galleryAll = $gallery;
        return $this;
    }
    public function belongs($gellery_belongs_to){
        $this->_galleryAll->where('galleries.belongs_to', '=' , $gellery_belongs_to);
        return $this;
    }

    public function inOrder($direcction = 'ASC',$column = 'sort_order'){
        $this->_galleryAll->orderBy($column, $direcction);
        return $this;
    }

    public function get($columns = 'images.*'){
        return $this->_galleryAll->get($columns);
    }
}