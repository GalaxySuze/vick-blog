<?php

namespace App\Http\Controllers\Backstage;

use App\Models\Label;
use App\Support\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LabelController extends Controller
{
    protected $master = 'label';
    protected $formEvent = 'labelForm';
    protected $tableName = 'LabelTableService';
    protected $searchBarName = 'LabelSearchService';
    protected $formName = 'LabelFormService';
    protected $model = Label::class;

    /**
     * @return array
     */
    public function validateRules()
    {
        return [
            'label' => 'required|max:255',
            'desc' => 'nullable|max:255',
            'label_icon' => 'required|max:255',
        ];
    }

    /**
     * @return array
     */
    public function validateMessages()
    {
        return [
            'label.required' => '请输入「标签」.',
            'label.max' => '「标签」最大长度为255个字符.',
            'desc.max' => '「描述」最大长度为255个字符.',
            'label_icon.required' => '请输入「图标」.',
            'label_icon.max' => '「图标」最大长度为255个字符.',
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
