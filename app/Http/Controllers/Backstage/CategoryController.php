<?php

namespace App\Http\Controllers\Backstage;

use App\Models\Category;
use App\Support\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    private $formEvent = 'categoryForm';

    private $routeConf;

    public function __construct()
    {
        $this->routeConf = Helper::routeDefault('category');
    }

    public function list()
    {
        return view('backstage.list', [
            'tableName' => $this->tableServices . 'CategoryTableService',
            'searchBarName' => $this->searchServices . 'CategorySearchService',
            'addRoute' => route($this->routeConf['addPage']),
            'dataRoute' => route($this->routeConf['data']),
            'formEvent' => $this->formEvent,
        ]);
    }

    public function listData(Request $request)
    {
        $categoryList = Category::getCategories(
            $request->conditions, $request->page, $request->limit
        );
        $this->handleDataDisplay($categoryList);
        return $this->successfulResponse(['successful', $categoryList, Category::count()]);
    }

    public function handleDataDisplay(&$data)
    {
        $data->each(function ($item, $key) {
            $item->editRoute = route($this->routeConf['editPage'], $item->id);
            $item->delRoute = route($this->routeConf['del'], $item->id);
        });
    }

    public function editor($id = null)
    {
        return view('backstage.editor', [
            'editRoute' => route($this->routeConf['edit']),
            'formName' => $this->formServices . 'CategoryFormService',
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
                $label = Category::find($input['id']);
                if ($label->update($input)) {
                    $msg = '更新成功!';
                }
            } else {
                if (Category::create($input)) {
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
            'name' => 'required|max:255',
            'desc' => 'nullable|max:255',
        ];
    }

    private function validateMessages()
    {
        return [
            'name.required' => '请输入「分类」.',
            'name.max' => '「分类」最大长度为255个字符.',
            'desc.max' => '「描述」最大长度为255个字符.',
        ];
    }

    private function handleInput(&$input, ...$support)
    {

    }

    public function delLabel($id)
    {
        return parent::del(Category::class, $id, route($this->routeConf['list']));
    }
}
