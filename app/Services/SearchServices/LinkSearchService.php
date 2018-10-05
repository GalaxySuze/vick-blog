<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 2018/10/5
 * Time: 11:56
 */

namespace App\Services\SearchServices;


use App\Models\Link;

class LinkSearchService
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
                        'inputName' => 'name',
                        'inputType' => 'text-input',
                        'value' => null,
                        'required' => false,
                        'label' => '名称',
                        'placeholder' => '请输入名称',
                    ],
                ]
            ],
            [
                'colM' => 'layui-col-md3',
                'formParts' => [
                    [
                        'inputName' => 'link',
                        'inputType' => 'text-input',
                        'value' => null,
                        'required' => false,
                        'label' => '链接',
                        'placeholder' => '请输入链接',
                    ],
                ]
            ],
            [
                'colM' => 'layui-col-md3',
                'formParts' => [
                    [
                        'inputName' => 'status',
                        'inputType' => 'select-input',
                        'value' => null,
                        'required' => false,
                        'label' => '状态',
                        'placeholder' => '',
                        'options' => ['' => '请选择...'] + Link::$linkStatus,
                    ],
                ]
            ],
        ];
        return $searchBar;
    }
}