<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 2018/10/5
 * Time: 11:58
 */

namespace App\Services\FormServices;


use App\Models\Link;

class LinkFormService
{
    /**
     * @var null
     */
    private $linkInfo = null;

    /**
     * LabelFormService constructor.
     * @param null $modelId
     */
    public function __construct($modelId = null)
    {
        if ($modelId) {
            $this->linkInfo = Link::find($modelId);
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
                        'label' => '名称',
                        'placeholder' => '请输入名称',
                        'value' => optional($this->linkInfo)->name,
                    ]
                ]
            ],
            [
                'colM' => 'layui-col-md6',
                'formParts' => [
                    [
                        'inputName' => 'link',
                        'inputType' => 'text-input',
                        'required' => true,
                        'label' => '链接',
                        'placeholder' => '请输入链接',
                        'value' => optional($this->linkInfo)->link,
                    ]
                ]
            ],
            [
                'colM' => 'layui-col-md6',
                'formParts' => [
                    [
                        'inputName' => 'image',
                        'inputType' => 'text-input',
                        'required' => true,
                        'label' => '图片',
                        'placeholder' => '请输入图片',
                        'value' => optional($this->linkInfo)->image,
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
                        'value' => optional($this->linkInfo)->status,
                        'options' => Link::$linkStatus,
                    ],
                ]
            ],
        ];
        return $form;
    }
}