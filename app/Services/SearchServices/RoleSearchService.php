<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 2018/10/4
 * Time: 15:45
 */

namespace App\Services\SearchServices;


use App\Models\Role;

class RoleSearchService
{
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
                        'inputName' => 'role_name',
                        'inputType' => 'text-input',
                        'value' => null,
                        'required' => false,
                        'label' => '角色',
                        'placeholder' => '请输入角色',
                    ],
                ]
            ],
            [
                'colM' => 'layui-col-md3',
                'formParts' => [
                    [
                        'inputName' => 'is_backstage',
                        'inputType' => 'select-input',
                        'value' => null,
                        'required' => false,
                        'label' => '范围',
                        'placeholder' => '',
                        'options' => ['' => '请选择...'] + Role::$isBackstage,
                    ],
                ]
            ],
        ];
        return $searchBar;
    }
}