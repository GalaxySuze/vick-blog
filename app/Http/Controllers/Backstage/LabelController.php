<?php

namespace App\Http\Controllers\Backstage;

use App\Models\Label;
use App\Support\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LabelController extends Controller
{
    private $formEvent = 'labelForm';

    private $routeConf;

    public function __construct()
    {
        $this->routeConf = Helper::routeDefault('label');
    }

    public function list()
    {
        return view('backstage.list', [
            'tableName' => $this->tableServices . 'LabelTableService',
            'searchBarName' => $this->searchServices . 'LabelSearchService',
            'addRoute' => route($this->routeConf['addPage']),
            'dataRoute' => route($this->routeConf['data']),
            'formEvent' => $this->formEvent,
        ]);
    }

    public function listData(Request $request)
    {
        $labelsList = Label::getLabels(
            $request->conditions, $request->page, $request->limit
        );
        $this->handleDataDisplay($labelsList);
        return $this->successfulResponse(['successful', $labelsList, Label::count()]);
    }

    public function handleDataDisplay(&$data)
    {
        $data->each(function ($item, $key) {
            $item->editRoute = route($this->routeConf['editPage'], $item->id);
            $item->delRoute = route($this->routeConf['del'], $item->id);
            $item->label_icon = app('url')->asset('img/icon/' . $item->label_icon);
        });
    }

    public function editor($id = null)
    {
        return view('backstage.editor', [
            'editRoute' => route($this->routeConf['edit']),
            'listRoute' => route($this->routeConf['list']),
            'formName' => $this->formServices . 'LabelFormService',
            'modelId' => $id,
            'formEvent' => $this->formEvent,
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
            return $this->successfulResponse([$msg, route($this->routeConf['list'])]);
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

    public function delLabel($id)
    {
        return parent::del(Label::class, $id, route($this->routeConf['list']));
    }

    private function handleInput(&$input, ...$support)
    {

    }
}
