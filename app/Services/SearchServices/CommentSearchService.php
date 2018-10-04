<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 2018/10/5
 * Time: 00:45
 */

namespace App\Services\SearchServices;


use App\Models\Comment;

class CommentSearchService
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
                        'inputName' => 'nickname',
                        'inputType' => 'text-input',
                        'value' => null,
                        'required' => false,
                        'label' => '游客昵称',
                        'placeholder' => '请输入游客昵称',
                    ],
                ]
            ],
            [
                'colM' => 'layui-col-md3',
                'formParts' => [
                    [
                        'inputName' => 'email',
                        'inputType' => 'text-input',
                        'value' => null,
                        'required' => false,
                        'label' => '游客邮箱',
                        'placeholder' => '请输入游客邮箱',
                    ],
                ]
            ],
            [
                'colM' => 'layui-col-md3',
                'formParts' => [
                    [
                        'inputName' => 'comment_type',
                        'inputType' => 'select-input',
                        'value' => null,
                        'required' => false,
                        'label' => '范围',
                        'placeholder' => '',
                        'options' => ['' => '请选择...'] + Comment::$commentType,
                    ],
                ]
            ],
        ];
        return $searchBar;
    }
}