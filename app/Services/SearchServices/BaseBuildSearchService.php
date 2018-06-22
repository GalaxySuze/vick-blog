<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 2018/6/19
 * Time: 21:48
 */

namespace App\Services\SearchServices;


class BaseBuildSearchService
{
    public function buildSearch($SearchBarName)
    {
        return (new $SearchBarName())->setSearch();
    }
}