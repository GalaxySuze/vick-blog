<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 2018/10/4
 * Time: 23:53
 */

namespace App\Services\SearchServices;


use App\Models\Role;
use App\Traits\Toolkit;

class UserSearchService
{
    use Toolkit;

    /**
     * @return array
     */
    public function setSearch()
    {
        $searchBar = [
            [
                'colM' => 'layui-col-md3',
                'formParts' => [
                    [
                        'inputName' => 'name',
                        'inputType' => 'text-input',
                        'value' => null,
                        'required' => false,
                        'label' => '用户名',
                        'placeholder' => '请输入用户名',
                    ],
                ]
            ],
            [
                'colM' => 'layui-col-md3',
                'formParts' => [
                    [
                        'inputName' => 'email',
                        'inputType' => 'text-input',
                        'value' => null,
                        'required' => false,
                        'label' => '邮箱',
                        'placeholder' => '请输入邮箱',
                    ],
                ]
            ],
            [
                'colM' => 'layui-col-md3',
                'formParts' => [
                    [
                        'inputName' => 'role_id',
                        'inputType' => 'select-input',
                        'value' => null,
                        'required' => false,
                        'label' => '角色',
                        'placeholder' => '',
                        'options' => ['' => '请选择...'] + $this->setRoles(),
                    ],
                ]
            ],
        ];
        return $searchBar;
    }

    /**
     * @param array $roleList
     * @return array
     */
    public function setRoles($roleList = [])
    {
        $roleData = empty($roleList)
            ? Role::getModelData()
            : $roleList;
        return $this->customKV($roleData, 'id', 'role_name');
    }
}