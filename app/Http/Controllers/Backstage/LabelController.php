<?php

namespace App\Http\Controllers\Backstage;

use App\Models\Label;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LabelController extends Controller
{
    public function __construct()
    {

    }

    public function list()
    {
        return view('backstage.list', [
            'tableName' => $this->tableServices . 'LabelTableService',
            'searchBarName' => $this->searchServices . 'LabelSearchService',
            'addRoute' => route('backstage.label.editor'),
            'dataRoute' => route('backstage.label.list-data'),
            'formEvent' => 'labelForm',
        ]);
    }

    public function listData(Request $request)
    {
        $labelsList = Label::getLabels($request->conditions);
        $this->handleDataDisplay($labelsList);
        return $this->successfulResponse(['successful', $labelsList, $labelsList->count()]);
    }

    public function handleDataDisplay(&$data)
    {
        $data->each(function ($item, $key) {
            $item->editRoute = route('backstage.label.editor', $item->id);
            $item->delRoute = route('backstage.label.del', $item->id);
            $item->label_icon = app('url')->asset('img/icon/' . $item->label_icon);
        });
    }

    public function editor($id = null)
    {
        return view('backstage.editor', [
            'formEvent' => 'labelForm',
            'editRoute' => route('backstage.label.edit'),
            'formName' => $this->formServices . 'LabelFormService',
            'modelId' => $id
        ]);
    }

    public function edit(Request $request)
    {
        try {
            $this->validate($request, $this->validateRules(), $this->validateMessages());
            $input = $request->all();
            $msg = '操作异常!';
            if (!empty($input['id'])) {
                $label = Label::find($input['id']);
                if ($label->update($input)) {
                    $msg = '更新成功!';
                }
            } else {
                if (Label::create($input)) {
                    $msg = '新增成功!';
                }
            }
            $request->session()->flash('msg', $msg);
            return $this->successfulResponse([$msg, route('backstage.label.list')]);
        } catch (\Throwable $e) {
            $getError = env('APP_DEBUG') ? $e->getMessage() : '当前操作发生错误!';
            return $this->failedResponse([$getError]);
        }
    }

    private function validateRules()
    {
        return [
            'label' => 'required|max:255',
            'desc' => 'nullable|max:255',
            'label_icon' => 'required|max:255',
        ];
    }

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

    private function handleInput(&$input, ...$support)
    {

    }

    public function delLabel($id)
    {
        return parent::del(Label::class, $id, route('backstage.label.list'));
    }
}