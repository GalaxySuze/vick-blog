<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 2018/10/5
 * Time: 00:03
 */

namespace App\Services\FormServices;


use App\Models\Role;
use App\Models\User;
use App\Traits\Toolkit;

class UserFormService
{
    use Toolkit;

    /**
     * @var null
     */
    private $userInfo = null;

    /**
     * LabelFormService constructor.
     * @param null $modelId
     */
    public function __construct($modelId = null)
    {
        if ($modelId) {
            $this->userInfo = User::find($modelId);
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
                        'inputName' => 'name',
                        'inputType' => 'text-input',
                        'required' => true,
                        'label' => '用户名',
                        'placeholder' => '请输入用户名',
                        'value' => optional($this->userInfo)->name,
                    ]
                ]
            ],
            [
                'colM' => 'layui-col-md6',
                'formParts' => [
                    [
                        'inputName' => 'nickname',
                        'inputType' => 'text-input',
                        'required' => false,
                        'label' => '昵称',
                        'placeholder' => '请输入昵称',
                        'value' => optional($this->userInfo)->nickname,
                    ]
                ]
            ],
            [
                'colM' => 'layui-col-md6',
                'formParts' => [
                    [
                        'inputName' => 'email',
                        'inputType' => 'text-input',
                        'inputBoxType' => 'email',
                        'required' => true,
                        'label' => '邮箱',
                        'placeholder' => '请输入邮箱',
                        'value' => optional($this->userInfo)->email,
                    ]
                ]
            ],
            [
                'colM' => 'layui-col-md6',
                'formParts' => [
                    [
                        'inputName' => 'password',
                        'inputType' => 'text-input',
                        'inputBoxType' => 'password',
                        'required' => true,
                        'label' => '密码',
                        'placeholder' => '请输入密码',
                        'value' => '',
                    ]
                ]
            ],
            [
                'colM' => 'layui-col-md6',
                'formParts' => [
                    [
                        'inputName' => 'status',
                        'inputType' => 'select-input',
                        'required' => true,
                        'label' => '状态',
                        'placeholder' => '',
                        'value' => optional($this->userInfo)->status,
                        'options' => User::$userStatus,
                    ],
                ]
            ],
            [
                'colM' => 'layui-col-md6',
                'formParts' => [
                    [
                        'inputName' => 'role_id',
                        'inputType' => 'select-input',
                        'required' => true,
                        'label' => '角色',
                        'placeholder' => '',
                        'value' => optional($this->userInfo)->role_id,
                        'options' => $this->setRoles(),
                    ],
                ]
            ],
            [
                'colM' => 'layui-col-md12',
                'formParts' => [
                    [
                        'inputName' => 'is_admin',
                        'inputType' => 'switch-input',
                        'required' => true,
                        'label' => '超级管理',
                        'placeholder' => '',
                        'value' => optional($this->userInfo)->is_admin,
                    ],
                ]
            ],
            [
                'colM' => 'layui-col-md12',
                'formParts' => [
                    [
                        'inputName' => 'email_notify_enabled',
                        'inputType' => 'switch-input',
                        'required' => true,
                        'label' => '邮件通知',
                        'placeholder' => '',
                        'value' => optional($this->userInfo)->email_notify_enabled,
                    ],
                ]
            ],
        ];
        return $form;
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