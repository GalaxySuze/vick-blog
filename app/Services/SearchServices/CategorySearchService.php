<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 2018/6/19
 * Time: 21:50
 */

namespace App\Services\SearchServices;


class CategorySearchService
{
    public function __construct()
    {

    }

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
                        'label' => '分类',
                        'placeholder' => '请输入分类',
                    ],
                ]
            ],
        ];
        return $searchBar;
    }
}