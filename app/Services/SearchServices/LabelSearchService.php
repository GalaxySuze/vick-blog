<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 2018/6/19
 * Time: 21:50
 */

namespace App\Services\SearchServices;


class LabelSearchService
{
    public function setSearch()
    {
        $searchBar = [
            [
                'colM' => 'layui-col-md3',
                'formParts' => [
                    [
                        'inputName' => 'label',
                        'inputType' => 'text-input',
                        'value' => null,
                        'required' => false,
                        'label' => '标签',
                        'placeholder' => '请输入标签',
                    ],
                ]
            ],
        ];
        return $searchBar;
    }
}