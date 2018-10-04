<?php

namespace App\Http\Controllers\Backstage;

use App\Models\Category;
use App\Support\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    protected $master = 'category';
    protected $formEvent = 'categoryForm';
    protected $tableName = 'CategoryTableService';
    protected $searchBarName = 'CategorySearchService';
    protected $formName = 'CategoryFormService';
    protected $model = Category::class;

    /**
     * @return array
     */
    public function validateRules()
    {
        return [
            'name' => 'required|max:255',
            'desc' => 'nullable|max:255',
        ];
    }

    /**
     * @return array
     */
    public function validateMessages()
    {
        return [
            'name.required' => '请输入「分类」.',
            'name.max' => '「分类」最大长度为255个字符.',
            'desc.max' => '「描述」最大长度为255个字符.',
        ];
    }

    /**
     * @param $id
     * @return array
     */
    public function delLabel($id)
    {
        return parent::del($id, route($this->routeConf['list']));
    }
}
