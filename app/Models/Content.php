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

/* 
    CREATE table galleries (
    id BIGINT(20) UNSIGNED NOT NULL auto_increment PRIMARY KEY,
    gallery_type INT(11) NOT NULL,
    module_id BIGINT(20) NOT NULL UNSIGNED,
    CONSTRAINT module_id_fk FOREIGN KEY module_id REFERENCES modules(id);
    ) ENGINE = InnoDB;

    CREATE table images (
    id BIGINT(20) UNSIGNED NOT NULL auto_increment PRIMARY KEY,
    image_src TEXT NOT NULL,
    image_alt TEXT NOT NULL,
    gallery_id BIGINT(20) NOT NULL UNSIGNED,
    CONSTRAINT gallery_id_fk FOREIGN KEY gallery_id REFERENCES galleries(id);
    )

    CREATE TABLE `learn_sql`.`galleries` (
        `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT ,
        `module_id` BIGINT(20) UNSIGNED , 
        `belongs_to` varchar(50) , 
        PRIMARY KEY (`id`)) ENGINE = InnoDB;

    CREATE TABLE `learn_sql`.`images` ( 
        `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT , 
        `image_src` TEXT NOT NULL , 
        `image_alt` TEXT NOT NULL , 
        `gallery_id` BIGINT(20) NOT NULL , 
        `sort_order` INT(11) NOT NULL ,
        PRIMARY KEY (`id`)) ENGINE = InnoDB;

    ALTER TABLE `images` 
    ADD CONSTRAINT `fk_gallery_id` 
    FOREIGN KEY (`gallery_id`) 
    REFERENCES `galleries`(`id`) 
    ON DELETE CASCADE ON UPDATE CASCADE;

    ALTER TABLE `images` 
    ADD `sort_order` INT(11) NOT NULL 
    DEFAULT '0' AFTER `gallery_type`;

    1.- fallo
    SELECT gal.* AS 'Gallery INFO' FROM images img, galleries gal;
    SELECT *  FROM galleries;

    2.-
    SELECT * FROM images INNER JOIN galleries ON images.gallery_id = galleries.id WHERE images.gallery_id = 1;

    3.-
    SELECT * FROM images 
    INNER JOIN galleries ON images.gallery_id = galleries.id
    WHERE images.gallery_id = 1 AND images.gallery_type = 1;
    
    4.-
    SELECT * FROM images 
    LEFT JOIN galleries ON images.gallery_id = galleries.id
    WHERE images.gallery_id = 1 AND images.gallery_type = 1;

    .-subconsult 1
    SELECT * FROM images                                    
    INNER JOIN galleries ON images.gallery_id = galleries.id
    WHERE galleries.belongs_to = 'partner';  
*/