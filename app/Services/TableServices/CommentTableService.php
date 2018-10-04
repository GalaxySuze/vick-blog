<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 2018/10/5
 * Time: 00:37
 */

namespace App\Services\TableServices;


class CommentTableService
{
    /**
     * @return array
     */
    private function setTableThead()
    {
        $thead = [
            [
                'name' => 'ID',
                'field' => 'id',
                'width' => '10%',
                'sort' => true,
                'align' => 'center',
            ],
            [
                'name' => '角色',
                'field' => 'nickname',
                'width' => '10%',
                'align' => 'center',
            ],
            [
                'name' => '邮箱',
                'field' => 'email',
                'width' => '10%',
                'align' => 'center',
            ],
            [
                'name' => '内容',
                'field' => 'content',
                'width' => '10%',
                'align' => 'center',
            ],
            [
                'name' => '评论目标',
                'field' => 'target',
                'width' => '10%',
                'align' => 'center',
            ],
            [
                'name' => '回复的评论ID',
                'field' => 'reply_comment_id',
                'width' => '10%',
                'align' => 'center',
            ],
            [
                'name' => '评论类别',
                'field' => 'comment_type',
                'width' => '10%',
                'align' => 'center',
            ],
            [
                'name' => 'IP',
                'field' => 'ip',
                'width' => '10%',
                'align' => 'center',
            ],
            [
                'name' => '赞同数',
                'field' => 'thumb',
                'width' => '10%',
                'align' => 'center',
            ],
            [
                'name' => '更新时间',
                'field' => 'updated_at',
                'width' => '20%',
                'align' => 'center',
            ],
            [
                'name' => '创建时间',
                'field' => 'created_at',
                'width' => '20%',
                'align' => 'center',
            ],
            [
                'name' => '操作',
                'toolbar' => '#operationBar',
                'fixed' => 'right',
                'width' => '20%',
                'align' => 'center',
            ],
        ];
        return $thead;
    }

    /**
     * @return array
     */
    public function setTable()
    {
        return $this->setTableThead();
    }
}