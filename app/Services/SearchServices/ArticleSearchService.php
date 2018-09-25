<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 2018/6/19
 * Time: 21:50
 */

namespace App\Services\SearchServices;


use App\Models\Article;
use App\Models\Category;
use App\Models\Label;
use App\Support\Helper;
use App\Traits\Toolkit;

class ArticleSearchService
{
    use Toolkit;

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
                        'options' => ['' => '请选择...'] + $this->setArticleCategories(),
                    ],
                ]
            ],
            [
                'colM' => 'layui-col-md3',
                'formParts' => [
                    [
                        'inputName' => 'status',
                        'inputType' => 'select-input',
                        'required' => false,
                        'label' => '状态',
                        'placeholder' => '',
                        'value' => null,
                        'options' => ['' => '请选择...'] + $this->setArticleStatus(),
                    ],
                ]
            ],
            [
                'colM' => 'layui-col-md3',
                'formParts' => [
                    [
                        'inputName' => 'label',
                        'inputType' => 'select-input',
                        'required' => false,
                        'label' => '标签',
                        'placeholder' => '',
                        'value' => null,
                        'options' => ['' => '请选择...'] + $this->setArticleLabels(),
                    ],
                ]
            ],
        ];
        return $searchBar;
    }

    /**
     * @param array $categoryList
     * @return array
     */
    public function setArticleCategories($categoryList = [])
    {
        $categoryData = empty($categoryList)
            ? Category::getModelData()
            : $categoryList;
        return $this->customKV($categoryData, 'id', 'name');
    }

    /**
     * @param array $labelList
     * @return array
     */
    public function setArticleLabels($labelList = [])
    {
        $labelData = empty($labelList)
            ? Label::getModelData()
            : $labelList;
        return $this->customKV($labelData, 'id', 'label');
    }

    /**
     * @return array
     */
    public function setArticleStatus()
    {
        return Article::$statusConf;
    }
}