<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 9/6/18
 * Time: 16:09
 */

namespace App\Services\TableServices;


class LabelTableService
{
    private function setTableThead()
    {
        $thead = [
            [
                'name' => 'ID',
                'field' => 'id',
                'width' => '8%',
                'sort' => true,
                'align' => 'center',
            ],
            [
                'name' => '标签',
                'field' => 'label',
                'width' => '18%',
                'align' => 'center',
            ],
            [
                'name' => '描述',
                'field' => 'desc',
                'width' => '18%',
                'align' => 'center',
            ],
            [
                'name' => '图标',
                'field' => 'label_icon',
                'templet' => '#labelIconTd',
                'width' => '18%',
                'align' => 'center',
            ],
            [
                'name' => '更新时间',
                'field' => 'updated_at',
                'width' => '12%',
                'align' => 'center',
            ],
            [
                'name' => '创建时间',
                'field' => 'created_at',
                'width' => '12%',
                'align' => 'center',
            ],
            [
                'name' => '操作',
                'toolbar' => '#operationBar',
                'fixed' => 'right',
                'width' => '15%',
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