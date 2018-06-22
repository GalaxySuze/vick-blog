<?php
return [
    'navTree' => [
        '文章管理' => [
            'icon' => 'layui-icon-read',
            'color' => '#ff8a80',
            'navItemRoute' => '#',
            'subNav' => [
                [
                    'name' => '文章中心',
                    'navChildRoute' => '#',
                ]
            ]
        ],
        '分类管理' => [
            'icon' => 'layui-icon-app',
            'color' => '#1E9FFF',
            'navItemRoute' => '#',
        ],
        '标签管理' => [
            'icon' => 'layui-icon-note',
            'color' => '#ea80fc',
            'navItemRoute' => '#',
        ],
        '评论管理' => [
            'icon' => 'layui-icon-reply-fill',
            'color' => '#82b1ff',
            'navItemRoute' => '#',
        ],
        '友链管理' => [
            'icon' => 'layui-icon-link',
            'color' => '#80d8ff',
            'navItemRoute' => '#',
        ],
        '用户管理' => [
            'icon' => 'layui-icon-group',
            'color' => '#b9f6ca',
            'navItemRoute' => '#',
        ],
        '日志管理' => [
            'icon' => 'layui-icon-log',
            'color' => '#ffff8d',
            'navItemRoute' => '#',
        ],
    ],
];