<?php
/**
 * Created by PhpStorm.
 * User: Sergii
 * Date: 15.01.2018
 * Time: 14:05
 */

namespace App;


trait Selectable
{

    public static function getSelectList($value = 'name', $key = 'id')
    {
        return static::latest()->owned()->pluck($value, $key);
    }

}