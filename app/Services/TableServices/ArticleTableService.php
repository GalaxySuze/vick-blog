<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 9/6/18
 * Time: 16:09
 */

namespace App\Services\TableServices;


class ArticleTableService
{
    private function setTableThead()
    {
        $thead = [
            [
                'name' => 'ID',
                'field' => 'id',
                'width' => '80',
                'sort' => true,
                'align' => 'center',
            ],
            [
                'name' => '标题',
                'field' => 'title',
                'width' => '160',
                'align' => 'center',
            ],
            [
                'name' => '描述',
                'field' => 'desc',
                'width' => '160',
                'align' => 'center',
            ],
            [
                'name' => '封面',
                'field' => 'page_image',
                'templet' => '#uploadImageTd',
                'width' => '150',
                'align' => 'center',
            ],
            [
                'name' => '链接',
                'field' => 'link',
                'width' => '120',
                'align' => 'center',
            ],
            [
                'name' => '关键字',
                'field' => 'keyword',
                'width' => '100',
                'align' => 'center',
            ],
            [
                'name' => '状态',
                'field' => 'status',
                'width' => '80',
                'align' => 'center',
            ],
            [
                'name' => '分类',
                'field' => 'category',
                'width' => '150',
                'align' => 'center',
            ],
            [
                'name' => '标签',
                'field' => 'label',
                'width' => '150',
                'align' => 'center',
            ],
            [
                'name' => '内容',
                'field' => 'original_content',
                'width' => '160',
                'align' => 'center',
            ],
            [
                'name' => '浏览量',
                'field' => 'views',
                'width' => '80',
                'sort' => true,
                'align' => 'center',
            ],
            [
                'name' => '分享数',
                'field' => 'share',
                'width' => '80',
                'sort' => true,
                'align' => 'center',
            ],
            [
                'name' => '发布时间',
                'field' => 'release_time',
                'width' => '120',
                'align' => 'center',
            ],
            [
                'name' => '创建时间',
                'field' => 'created_at',
                'width' => '120',
                'align' => 'center',
            ],
            [
                'name' => '更新时间',
                'field' => 'updated_at',
                'width' => '120',
                'align' => 'center',
            ],
            [
                'name' => '原创',
                'field' => 'is_original',
                'width' => '80',
                'align' => 'center',
            ],
            [
                'name' => '创建人',
                'field' => 'created_user',
                'width' => '80',
                'align' => 'center',
            ],
            [
                'name' => '操作',
                'toolbar' => '#operationBar',
                'fixed' => 'right',
                'width' => '150',
                'align' => 'center',
            ],
        ];
        return $thead;
    }

    public function setTable()
    {
        return $this->setTableThead();
    }

}