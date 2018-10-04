<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 2018/10/4
 * Time: 23:49
 */

namespace App\Services\TableServices;


class UserTableService
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
                'name' => '用户名',
                'field' => 'name',
                'width' => '10%',
                'align' => 'center',
            ],
            [
                'name' => '昵称',
                'field' => 'nickname',
                'width' => '10%',
                'align' => 'center',
            ],
            [
                'name' => '头像',
                'field' => 'avatar',
                'width' => '10%',
                'align' => 'center',
            ],
            [
                'name' => '邮箱',
                'field' => 'email',
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
                'name' => '是否管理员',
                'field' => 'is_admin',
                'width' => '10%',
                'align' => 'center',
            ],
            [
                'name' => '角色',
                'field' => 'role_name',
                'width' => '10%',
                'align' => 'center',
            ],
            [
                'name' => '启用邮件通知',
                'field' => 'email_notify_enabled',
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