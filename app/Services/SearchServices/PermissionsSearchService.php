<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 2018/10/4
 * Time: 16:33
 */

namespace App\Services\SearchServices;


use App\Models\Role;
use App\Traits\Toolkit;

class PermissionsSearchService
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
                        'inputName' => 'perm_name',
                        'inputType' => 'text-input',
                        'value' => null,
                        'required' => false,
                        'label' => '权限',
                        'placeholder' => '请输入权限',
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