<?php
/**
 * Created by PhpStorm.
 * User: Sergii
 * Date: 08.01.2018
 * Time: 13:14
 */

namespace App;


trait SelectTrait{
    public static function getSelectId($value = 'name', $key = 'id')
    {
        return static::latest()->owned()->pluck($value, $key);
    }


//    public static function wert($value = 'name', $key = 'id'){
//        return static::latest()-> pluck($value, $key);
//    }

}