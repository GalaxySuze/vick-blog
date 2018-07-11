<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 2018/7/10
 * Time: 19:11
 */

namespace App\Support;

class Helper
{
    public static function modelAll($model, $keyBy = 'id', $toArray = true)
    {
        $dao = $model::all()->keyBy($keyBy);
        return $toArray ? $dao->toArray() : $dao;
    }
}