<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 6/6/18
 * Time: 11:30
 */

namespace App\Services\FormServices;

use App\Models\Label;

class LabelFormService
{
    /**
     * @var null
     */
    private $labelInfo = null;

    /**
     * LabelFormService constructor.
     * @param null $modelId
     */
    public function __construct($modelId = null)
    {
        if ($modelId) {
            $this->labelInfo = Label::find($modelId);
        }
    }

    /**
     * @return array
     */
    public function setForm()
    {
        $form = [
            [
                'colM' => 'layui-col-md12',
                'formParts' => [
                    [
                        'inputName' => 'label',
                        'inputType' => 'text-input',
                        'required' => true,
                        'label' => '标签',
                        'placeholder' => '请输入标签',
                        'value' => optional($this->labelInfo)->label,
                    ]
                ]
            ],
            [
                'colM' => 'layui-col-md12',
                'formParts' => [
                    [
                        'inputName' => 'desc',
                        'inputType' => 'text-input',
                        'required' => false,
                        'label' => '描述',
                        'placeholder' => '请输入描述',
                        'value' => optional($this->labelInfo)->desc,
                    ]
                ]
            ],
            [
                'colM' => 'layui-col-md12',
                'formParts' => [
                    [
                        'inputName' => 'label_icon',
                        'inputType' => 'text-input',
                        'required' => true,
                        'label' => '图标',
                        'placeholder' => '请输入图标',
                        'value' => optional($this->labelInfo)->label_icon,
                    ]
                ]
            ]
        ];
        return $form;
    }
}