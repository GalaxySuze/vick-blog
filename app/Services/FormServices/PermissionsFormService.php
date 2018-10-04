<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 2018/10/4
 * Time: 16:36
 */

namespace App\Services\FormServices;


use App\Models\Permissions;
use App\Models\Role;
use App\Traits\Toolkit;

class PermissionsFormService
{
    use Toolkit;

    /**
     * @var null
     */
    private $permInfo = null;

    /**
     * LabelFormService constructor.
     * @param null $modelId
     */
    public function __construct($modelId = null)
    {
        if ($modelId) {
            $this->permInfo = Permissions::find($modelId);
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
                        'inputName' => 'perm_name',
                        'inputType' => 'text-input',
                        'required' => true,
                        'label' => '权限',
                        'placeholder' => '请输入权限',
                        'value' => optional($this->permInfo)->perm_name,
                    ]
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
                        'value' => optional($this->permInfo)->role_id,
                        'options' => $this->setRoles(),
                    ],
                ]
            ],
            [
                'colM' => 'layui-col-md12',
                'formParts' => [
                    [
                        'inputName' => 'perm_desc',
                        'inputType' => 'text-input',
                        'required' => false,
                        'label' => '描述',
                        'placeholder' => '请输入描述',
                        'value' => optional($this->permInfo)->perm_desc,
                    ]
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