<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 2018/7/10
 * Time: 19:11
 */

namespace App\Support;

use Illuminate\Support\Facades\Route;

class Helper
{
    /**
     * @param $model
     * @param string $keyBy
     * @param bool $toArray
     * @param array $fields
     * @return mixed
     */
    public static function modelAll($model, $keyBy = 'id', $toArray = true, $fields = ['*'])
    {
        $dao = $model::all($fields)->keyBy($keyBy);
        return $toArray ? $dao->toArray() : $dao;
    }

    /**
     * @param $group
     * @return array
     */
    public static function routeDefault($group)
    {
        return [
            'addPage' => 'backstage.' . $group . '.editor', //新增页
            'editPage' => 'backstage.' . $group . '.editor',    //编辑页
            'add' => 'backstage.' . $group . '.edit', //新增操作
            'edit' => 'backstage.' . $group . '.edit',  //编辑操作
            'del' => 'backstage.' . $group . '.del',    //删除操作
            'data' => 'backstage.' . $group . '.list-data', //列表数据
            'list' => 'backstage.' . $group . '.list', //列表页
        ];
    }

    /**
     * @param $group
     */
    public static function routeDefine($group)
    {
        $controllerName = title_case($group);
        // 列表页
        Route::get($group . '/list', $controllerName . 'Controller@list')
            ->name('backstage.' . $group . '.list');
        // 列表数据
        Route::get($group . '/list-data', $controllerName . 'Controller@listData')
            ->name('backstage.' . $group . '.list-data');
        // 新增和修改页
        Route::match(['get', 'post'], $group . '/editor/{id?}', $controllerName . 'Controller@editor')
            ->name('backstage.' . $group . '.editor');
        // 新增和修改操作
        Route::post($group . '/edit', $controllerName . 'Controller@edit')
            ->name('backstage.' . $group . '.edit');
        // 删除操作
        Route::get($group . '/del/{id}', $controllerName . 'Controller@delLabel')
            ->name('backstage.' . $group . '.del');
    }

}