<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 2018/10/4
 * Time: 15:50
 */

namespace App\Services\FormServices;


use App\Models\Role;

class RoleFormService
{
    /**
     * @var null
     */
    private $roleInfo = null;

    /**
     * LabelFormService constructor.
     * @param null $modelId
     */
    public function __construct($modelId = null)
    {
        if ($modelId) {
            $this->roleInfo = Role::find($modelId);
        }
    }

    /**
     * @return array
     */
    public function setForm()
    {
        $form = [
            [
                'colM' => 'layui-col-md6',
                'formParts' => [
                    [
                        'inputName' => 'role_name',
                        'inputType' => 'text-input',
                        'required' => true,
                        'label' => '角色',
                        'placeholder' => '请输入角色',
                        'value' => optional($this->roleInfo)->role_name,
                    ]
                ]
            ],
            [
                'colM' => 'layui-col-md6',
                'formParts' => [
                    [
                        'inputName' => 'is_backstage',
                        'inputType' => 'select-input',
                        'required' => true,
                        'label' => '范围',
                        'placeholder' => '',
                        'value' => optional($this->roleInfo)->is_backstage,
                        'options' => Role::$isBackstage,
                    ],
                ]
            ],
            [
                'colM' => 'layui-col-md12',
                'formParts' => [
                    [
                        'inputName' => 'role_desc',
                        'inputType' => 'text-input',
                        'required' => false,
                        'label' => '描述',
                        'placeholder' => '请输入描述',
                        'value' => optional($this->roleInfo)->role_desc,
                    ]
                ]
            ],
        ];
        return $form;
    }
}