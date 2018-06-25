<?php

namespace App\Http\Controllers\Backstage;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function __construct()
    {

    }

    public function list()
    {
        return view('backstage.list', [
            'tableName' => $this->tableServices . 'CategoryTableService',
            'searchBarName' => $this->searchServices . 'CategorySearchService',
            'addRoute' => route('backstage.category.editor'),
            'dataRoute' => route('backstage.category.list-data'),
            'formEvent' => 'categoryForm',
        ]);
    }

    public function listData(Request $request)
    {
        $categoryList = Category::getCategories($request->conditions);
        $this->handleDataDisplay($categoryList);
        return $this->successfulResponse(['successful', $categoryList, $categoryList->count()]);
    }

    public function handleDataDisplay(&$data)
    {
        $data->each(function ($item, $key) {
            $item->editRoute = route('backstage.category.editor', $item->id);
            $item->delRoute = route('backstage.category.del', $item->id);
        });
    }

    public function editor($id = null)
    {
        return view('backstage.editor', [
            'formEvent' => 'categoryForm',
            'editRoute' => route('backstage.category.edit'),
            'formName' => $this->formServices . 'CategoryFormService',
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
            return $this->successfulResponse([$msg, route('backstage.label.list')]);
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
        return parent::del(Category::class, $id, route('backstage.category.list'));
    }
}
