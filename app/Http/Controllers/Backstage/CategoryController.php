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
     * @param Request $request
     * @return array
     */
    public function listData(Request $request)
    {
        $categoryList = Category::getModelData(
            $request->conditions,
            $request->page,
            $request->limit
        );
        $this->handleDataDisplay($categoryList);
        return $this->successfulResponse([
            'successful',
            $categoryList,
            Category::count()
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
                Category::find($input['id'])->update($input);
                $msg = '更新成功!';
            } else {
                Category::create($input);
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
            'name' => 'required|max:255',
            'desc' => 'nullable|max:255',
        ];
    }

    /**
     * @return array
     */
    private function validateMessages()
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
