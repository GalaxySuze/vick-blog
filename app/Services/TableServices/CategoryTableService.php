<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 2018/6/24
 * Time: 17:08
 */

namespace App\Services\TableServices;


class CategoryTableService
{
    private function setTableThead()
    {
        $thead = [
            [
                'name' => 'ID',
                'field' => 'id',
                'width' => '10%',
                'sort' => true,
                'align' => 'center',
            ],
            [
                'name' => '分类',
                'field' => 'name',
                'width' => '10%',
                'align' => 'center',
            ],
            [
                'name' => '描述',
                'field' => 'desc',
                'width' => '20%',
                'align' => 'center',
            ],
            [
                'name' => '更新时间',
                'field' => 'updated_at',
                'width' => '20%',
                'align' => 'center',
            ],
            [
                'name' => '创建时间',
                'field' => 'created_at',
                'width' => '20%',
                'align' => 'center',
            ],
            [
                'name' => '操作',
                'toolbar' => '#operationBar',
                'fixed' => 'right',
                'width' => '20%',
                'align' => 'center',
            ],
        ];
        return $thead;
    }

    public function setTable()
    {
        return $this->setTableThead();
    }
}