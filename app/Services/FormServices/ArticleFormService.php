<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 6/6/18
 * Time: 11:30
 */

namespace App\Services\FormServices;

use App\Models\Article;
use Carbon\Carbon;

class ArticleFormService
{
    private $articelInfo = null;

    public function __construct($modelId)
    {
        if ($modelId) {
            $this->articelInfo = Article::find($modelId);
        }
    }

    public function setForm()
    {
        $form = [
            [
                'colM' => 'layui-col-md6',
                'formParts' => [
                    [
                        'inputName' => 'title',
                        'inputType' => 'text-input',
                        'required' => true,
                        'label' => '标题',
                        'placeholder' => '请输入文章标题',
                        'value' => optional($this->articelInfo)->title,
                    ],
                    [
                        'inputName' => 'desc',
                        'inputType' => 'text-input',
                        'required' => true,
                        'label' => '描述',
                        'placeholder' => '请输入文章描述',
                        'value' => optional($this->articelInfo)->desc,
                    ],
                    [
                        'inputName' => 'keyword',
                        'inputType' => 'text-input',
                        'required' => true,
                        'label' => '关键词',
                        'placeholder' => '请输入文章关键词',
                        'value' => optional($this->articelInfo)->keyword,
                    ],
                    [
                        'inputName' => 'release_time',
                        'inputType' => 'date-input',
                        'required' => false,
                        'label' => '发布时间',
                        'placeholder' => '请输入发布时间',
                        'value' => optional($this->articelInfo)->release_time ?
                            Carbon::parse($this->articelInfo->release_time)->toDateString() : Carbon::now()->toDateString(),
                    ],
                    [
                        'inputName' => 'label',
                        'inputType' => 'checkbox-input',
                        'required' => true,
                        'label' => '标签',
                        'placeholder' => '请输入文章标签',
                        'value' => optional($this->articelInfo)->label,
                        'options' => [
                            1 => 'PHP',
                            2 => 'Python',
                            3 => 'JS',
                            4 => 'Nginx',
                        ],
                    ],
                ]
            ],
            [
                'colM' => 'layui-col-md6',
                'formParts' => [
                    [
                        'inputName' => 'link',
                        'inputType' => 'text-input',
                        'required' => false,
                        'label' => '链接',
                        'placeholder' => '请输入文章链接',
                        'value' => optional($this->articelInfo)->link,
                    ],
                    [
                        'inputName' => 'status',
                        'inputType' => 'select-input',
                        'required' => true,
                        'label' => '状态',
                        'placeholder' => '',
                        'value' => optional($this->articelInfo)->status,
                        'options' => [
                            0 => '草稿',
                            1 => '正常',
                            2 => '置顶',
                        ],
                    ],
                    [
                        'inputName' => 'category',
                        'inputType' => 'select-input',
                        'required' => true,
                        'label' => '分类',
                        'placeholder' => '',
                        'value' => optional($this->articelInfo)->category,
                        'options' => [
                            0 => '前端',
                            1 => '后端',
                            2 => '生活',
                        ],
                    ],
                    [
                        'inputName' => 'is_original',
                        'inputType' => 'switch-input',
                        'required' => false,
                        'label' => '是否原创',
                        'placeholder' => '',
                        'value' => optional($this->articelInfo)->is_original,
                    ],
                    [
                        'inputName' => 'page_image',
                        'inputType' => 'upload-input',
                        'required' => false,
                        'label' => '封面',
                        'placeholder' => '请上传文章封面',
                        'value' => optional($this->articelInfo)->page_image,
                        'rowId' => optional($this->articelInfo)->id,
                        'route' => route('backstage.article.upload-image'),
                    ],
                ]
            ],
            [
                'colM' => 'layui-col-md12',
                'formParts' => [
                    [
                        'inputName' => 'content',
                        'inputType' => 'textarea-input',
                        'required' => false,
                        'label' => '内容',
                        'placeholder' => '请输入文章内容',
                        'value' => optional($this->articelInfo)->content,
                    ]
                ]
            ],
        ];
        return $form;
    }
}