<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 2018/6/19
 * Time: 21:50
 */

namespace App\Services\SearchServices;


use App\Models\Category;
use App\Support\ToolkitSupport;

class ArticleSearchService
{
    use ToolkitSupport;

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
                        'inputName' => 'title',
                        'inputType' => 'text-input',
                        'value' => null,
                        'required' => false,
                        'label' => '标题',
                        'placeholder' => '请输入文章标题',
                    ],
                ]
            ],
            [
                'colM' => 'layui-col-md3',
                'formParts' => [
                    [
                        'inputName' => 'keyword',
                        'inputType' => 'text-input',
                        'value' => null,
                        'required' => false,
                        'label' => '关键词',
                        'placeholder' => '请输入文章关键词',
                    ],
                ]
            ],
            [
                'colM' => 'layui-col-md3',
                'formParts' => [
                    [
                        'inputName' => 'category',
                        'inputType' => 'select-input',
                        'required' => false,
                        'label' => '分类',
                        'placeholder' => '',
                        'value' => null,
                        'options' => [0 => '请选择...'] + $this->setArticleCategories(),
                    ],
                ]
            ],
        ];
        return $searchBar;
    }

    public function setArticleCategories($categoryList = [])
    {
        $categoryData = empty($categoryList) ? Category::getCategories() : $categoryList;
        return $this->customKV($categoryData, 'id', 'name');
    }
}