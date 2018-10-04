<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 2018/6/24
 * Time: 16:06
 */

namespace App\Services\NavigationServices;


class BackstageNavService
{
    /**
     * @return array
     */
    public function setNav()
    {
        return [
            '文章管理' => [
                'icon' => 'layui-icon-read',
                'color' => '#ff8a80',
                'navItemRoute' => '#',
                'subNav' => [
                    [
                        'name' => '文章中心',
                        'navChildRoute' => route('backstage.article.list'),
                    ]
                ]
            ],
            '分类管理' => [
                'icon' => 'layui-icon-app',
                'color' => '#1E9FFF',
                'navItemRoute' => route('backstage.category.list'),
            ],
            '标签管理' => [
                'icon' => 'layui-icon-note',
                'color' => '#ea80fc',
                'navItemRoute' => route('backstage.label.list'),
            ],
            '评论管理' => [
                'icon' => 'layui-icon-reply-fill',
                'color' => '#82b1ff',
                'navItemRoute' => route('backstage.comment.list'),
            ],
            '友链管理' => [
                'icon' => 'layui-icon-link',
                'color' => '#80d8ff',
                'navItemRoute' => '#',
            ],
            '用户管理' => [
                'icon' => 'layui-icon-group',
                'color' => '#b9f6ca',
                'navItemRoute' => route('backstage.user.list'),
            ],
            '权限管理' => [
                'icon' => 'layui-icon-auz',
                'color' => '#ff8a80',
                'navItemRoute' => '#',
                'subNav' => [
                    [
                        'name' => '角色列表',
                        'navChildRoute' => route('backstage.role.list'),
                    ],
                    [
                        'name' => '权限列表',
                        'navChildRoute' => route('backstage.permissions.list'),
                    ],
                ]
            ],
            '日志管理' => [
                'icon' => 'layui-icon-log',
                'color' => '#ffff8d',
                'navItemRoute' => '#',
            ],
        ];
    }

}