<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 5/6/18
 * Time: 23:00
 */

namespace App\Services\FormServices;

class BaseBuildFormService
{
    public function buildForm($formName, $modelId)
    {
        return (new $formName($modelId))->setForm();
    }
}