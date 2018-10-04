<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 2018/10/4
 * Time: 15:42
 */

namespace App\Services\TableServices;


class RoleTableService
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
                'name' => '角色',
                'field' => 'role_name',
                'width' => '10%',
                'align' => 'center',
            ],
            [
                'name' => '描述',
                'field' => 'role_desc',
                'width' => '20%',
                'align' => 'center',
            ],
            [
                'name' => '范围',
                'field' => 'is_backstage',
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