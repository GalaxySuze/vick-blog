<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 9/6/18
 * Time: 16:43
 */

namespace App\Traits;


trait ResponseHelper
{
    private $successCode = 0;
    private $failureCode = 1;

    /**
     * 成功的响应
     * @param array $value
     * @return array
     */
    public function successfulResponse(array $value)
    {
        return array_merge(
            $this->setResponseValue($value),
            ['code' => $this->successCode]
        );
    }

    /**
     * 约定消息参数位
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
     * 失败的响应
     * @param array $value
     * @return array
     */
    public function failedResponse(array $value)
    {
        return array_merge(
            $this->setResponseValue($value),
            ['code' => $this->failureCode]
        );
    }
}