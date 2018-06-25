<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 6/6/18
 * Time: 11:30
 */

namespace App\Services\FormServices;

use App\Models\Category;
use App\Models\Label;

class CategoryFormService
{
    private $categoryInfo = null;

    public function __construct($modelId = null)
    {
        if ($modelId) {
            $this->categoryInfo = Category::find($modelId);
        }
    }

    public function setForm()
    {
        $form = [
            [
                'colM' => 'layui-col-md12',
                'formParts' => [
                    [
                        'inputName' => 'name',
                        'inputType' => 'text-input',
                        'required' => true,
                        'label' => '分类',
                        'placeholder' => '请输入分类',
                        'value' => optional($this->categoryInfo)->name,
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
                        'value' => optional($this->categoryInfo)->desc,
                    ]
                ]
            ],
        ];
        return $form;
    }
}