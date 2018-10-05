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
                        'name' => '文章列表',
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
                'navItemRoute' => route('backstage.link.list'),
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
//            '日志管理' => [
//                'icon' => 'layui-icon-console',
//                'color' => '#ffff8d',
//                'navItemRoute' => '#',
//            ],
        ];
    }

    /**
     * @return array
     */
    public function setBreadcrumbNav()
    {
        $routeURL = [
            'backstage/dashboard' => '首页',
            'backstage/article/list' => '文章管理 / 文章中心',
            'backstage/article/editor/{id?}' => '文章管理 / 文章编辑',
            'backstage/category/list' => '分类管理',
            'backstage/category/editor/{id?}' => '分类管理 / 分类编辑',
            'backstage/label/list' => '标签管理',
            'backstage/label/editor/{id?}' => '标签管理 / 标签编辑',
            'backstage/comment/list' => '评论管理',
            'backstage/link/list' => '友链管理',
            'backstage/link/editor/{id?}' => '友链管理 / 友链编辑',
            'backstage/user/list' => '用户管理',
            'backstage/user/editor/{id?}' => '用户管理 / 用户编辑',
            'backstage/role/list' => '权限管理 / 角色中心',
            'backstage/role/editor/{id?}' => '权限管理 / 角色编辑',
            'backstage/permissions/list' => '权限管理 / 权限中心',
            'backstage/permissions/editor/{id?}' => '权限管理 / 权限编辑',
            'backstage/log/list' => '日志管理',
            'backstage/log/editor/{id?}' => '日志管理 / 日志编辑',
        ];
        return $routeURL;
    }
}