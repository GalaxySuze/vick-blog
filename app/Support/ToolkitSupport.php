<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 2018/6/24
 * Time: 17:22
 */

namespace App\Support;


trait ToolkitSupport
{
    /**
     * 自定义数组key value
     * @param array $data
     * @param $key
     * @param null $value
     * @return array
     */
    public function customKV($data, $key, $value = null)
    {
        $arr = [];
        foreach ($data as $item) {
            $arr[$item->{$key}] = $item->{$value} ?? $item;
        }
        return $arr;
    }

    /**
     * @param $data
     * @param $key
     */
    public function customGroup($data, $key)
    {
        $arr = [];
        foreach ($data as $item) {
            $arr[$item[$key]][] = $item;
        }
    }

    /**
     * @param $array
     * @param $size
     * @return array
     */
    public function sliceArray($array, $size)
    {
        $resultArray = [];
        for ($i = 0; $i < count($array); $i++) {
            $group = $i % $size;
            $resultArray[$group][] = $array[$i];
        }
        return $resultArray;
    }
}