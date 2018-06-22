<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 9/6/18
 * Time: 16:09
 */

namespace App\Services\TableServices;


class BaseBuildTableService
{
    public function buildTable($tableName)
    {
        return (new $tableName())->setTable();
    }
}