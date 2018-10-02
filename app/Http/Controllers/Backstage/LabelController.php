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
     * @param Request $request
     * @return array
     */
    public function listData(Request $request)
    {
        $labelsList = Label::getModelData(
            $request->conditions,
            $request->page,
            $request->limit
        );
        $this->handleDataDisplay($labelsList);
        return $this->successfulResponse([
            'successful',
            $labelsList,
            Label::count()
        ]);
    }

    /**
     * @param $data
     */
    public function handleDataDisplay(&$data)
    {
        $data->each(function ($item, $key) {
            $item->editRoute = route($this->routeConf['editPage'], $item->id);
            $item->delRoute = route($this->routeConf['del'], $item->id);
            $item->label_icon = app('url')->asset('img/icon/' . $item->label_icon);
        });
    }

    /**
     * @param Request $request
     * @return array
     */
    public function edit(Request $request)
    {
        $this->validate($request, $this->validateRules(), $this->validateMessages());
        $input = $request->all();
        try {
            if (!empty($input['id'])) {
                Label::find($input['id'])->update($input);
                $msg = '更新成功!';
            } else {
                Label::create($input);
                $msg = '新增成功!';
            }
            $request->session()->flash('msg', $msg);
            return $this->successfulResponse([$msg, route($this->routeConf['list'])]);
        } catch (\Throwable $e) {
            return $this->failedResponse([$this->exceptionMsg($e)]);
        }
    }

    /**
     * @return array
     */
    private function validateRules()
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
    private function validateMessages()
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
