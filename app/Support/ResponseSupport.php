<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 9/6/18
 * Time: 16:43
 */

namespace App\Support;


trait ResponseSupport
{
    /**
     * @param array $value
     * @return array
     */
    private function setResponseValue(array $value)
    {
        switch (count($value)) {
            case 1:
                list($msg) = $value;
                break;
            case 2:
                list($msg, $data) = $value;
                break;
            case 3:
                list($msg, $data, $count) = $value;
                break;
        }
        return compact('msg', 'data', 'count');
    }

    /**
     * 成功的响应
     * @param array $value
     * @return array
     */
    public function successfulResponse(array $value)
    {
        return array_merge($this->setResponseValue($value), ['code' => 0]);
    }

    /**
     * 失败的响应
     * @param array $value
     * @return array
     */
    public function failedResponse(array $value)
    {
        return array_merge($this->setResponseValue($value), ['code' => 1]);
    }
}