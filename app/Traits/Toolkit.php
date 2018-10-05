<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 2018/6/24
 * Time: 17:22
 */

namespace App\Traits;


trait Toolkit
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
     * 自定义key分组
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
     * 自定义数组切片
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

    /**
     * 格式化错误信息
     * @param $e
     * @return string
     */
    public function exceptionMsg($e)
    {
        $msg = '操作发生错误!';
        if (env('APP_DEBUG')) {
            $msg = '[错误信息]: ' . $e->getMessage() . '<br/>';
            $msg .= '[错误行数]: ' . $e->getLine() . '<br/>';
            $msg .= '[错误文件]: ' . $e->getFile();
        }
        return $msg;
    }

    /**
     * 实例依赖类
     * @param $support
     * @return mixed
     */
    public function setSupport($support)
    {
        return new $support();
    }
}