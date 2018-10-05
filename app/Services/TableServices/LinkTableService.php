<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 2018/10/5
 * Time: 11:55
 */

namespace App\Services\TableServices;


class LinkTableService
{
    /**
     * @return array
     */
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
                'name' => '名称',
                'field' => 'name',
                'width' => '10%',
                'align' => 'center',
            ],
            [
                'name' => '链接',
                'field' => 'link',
                'width' => '10%',
                'align' => 'center',
            ],
            [
                'name' => '图片',
                'field' => 'image',
                'templet' => '#linkImageTd',
                'width' => '10%',
                'align' => 'center',
            ],
            [
                'name' => '状态',
                'field' => 'status',
                'width' => '10%',
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

    /**
     * @return array
     */
    public function setTable()
    {
        return $this->setTableThead();
    }
}