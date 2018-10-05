<?php

namespace App\Http\Controllers;

use App\Support\Helper;
use App\Traits\ResponseHelper;
use App\Traits\Toolkit;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, ResponseHelper, Toolkit;

    /**
     * @var string
     */
    protected $tableServices = 'App\Services\TableServices\\';
    /**
     * @var string
     */
    protected $formServices = 'App\Services\FormServices\\';
    /**
     * @var string
     */
    protected $searchServices = 'App\Services\SearchServices\\';
    /**
     * @var
     */
    protected $master;
    /**
     * @var array
     */
    protected $routeConf;
    /**
     * @var
     */
    protected $tableName;
    /**
     * @var
     */
    protected $searchBarName;
    /**
     * @var
     */
    protected $formName;
    /**
     * @var
     */
    protected $formEvent;
    /**
     * @var
     */
    protected $model;
    /**
     * @var
     */
    protected $addPageRoute;
    /**
     * @var
     */
    protected $dataRoute;
    /**
     * @var
     */
    protected $editRoute;
    /**
     * @var
     */
    protected $listRoute;
    /**
     * @var
     */
    protected $navTop;
    /**
     * @var
     */
    protected $navSecond;
    /**
     * @var
     */
    protected $navSecondEdit;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->routeConf = Helper::routeDefault($this->master);
        $this->addPageRoute = route($this->routeConf['addPage']);
        $this->dataRoute = route($this->routeConf['data']);
        $this->editRoute = route($this->routeConf['edit']);
        $this->listRoute = route($this->routeConf['list']);
    }

    /**
     * 列表页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list()
    {
        return view('backstage.list', [
            'tableName' => $this->tableServices . $this->tableName,
            'searchBarName' => $this->searchServices . $this->searchBarName,
            'addPageRoute' => $this->addPageRoute,
            'dataRoute' => $this->dataRoute,
            'formEvent' => $this->formEvent,
        ]);
    }

    /**
     * 获取数据
     * @param Request $request
     * @return array
     */
    public function listData(Request $request)
    {
        $data = $this->model::getModelData(
            $request->conditions,
            $request->page,
            $request->limit
        );
        $this->handleDataDisplay($data);
        return $this->successfulResponse([
            'successful',
            $data,
            $this->model::count()
        ]);
    }

    /**
     * 处理列表数据
     * @param $data
     */
    public function handleDataDisplay(&$data)
    {
        if ($data) {
            $data->each(function ($item, $key) {
                $item->editRoute = route($this->routeConf['editPage'], $item->id);
                $item->delRoute = route($this->routeConf['del'], $item->id);
                $item->allowEdit = true;
                $item->allowDel = true;
            });
        }
    }

    /**
     * 编辑页面
     * @param null $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editor($id = null)
    {
        return view('backstage.editor', [
            'editRoute' => $this->editRoute,
            'listRoute' => $this->listRoute,
            'formName' => $this->formServices . $this->formName,
            'formEvent' => $this->formEvent,
            'modelId' => $id,
        ]);
    }

    /**
     * 新增/编辑 操作
     * @param Request $request
     * @return array
     */
    public function edit(Request $request)
    {
        $this->validate($request, $this->verifyRules(), $this->verifyMessages());
        $input = $request->all();
        $this->inputFilter($input);
        try {
            if (!empty($input['id'])) {
                $this->beforeUpdate($input);
                $instance = $this->model::find($input['id'])->update($input);
                $this->afterUpdate($instance, $input);
                $msg = '更新成功!';
            } else {
                $this->beforeAdd($input);
                $instance = $this->model::create($input);
                $this->afterAdd($instance, $input);
                $msg = '新增成功!';
            }
            $request->session()->flash('msg', $msg);
            return $this->successfulResponse([$msg, route($this->routeConf['list'])]);
        } catch (\Throwable $e) {
            return $this->failedResponse([$this->exceptionMsg($e)]);
        }
    }

    /**
     * @param $input
     */
    public function inputFilter(&$input)
    {

    }

    /**
     * 新增之前
     * @param $input
     */
    public function beforeAdd(&$input)
    {

    }

    /**
     * 更新之前
     * @param $input
     */
    public function beforeUpdate(&$input)
    {

    }

    /**
     * 新增之后
     * @param $model
     * @param $input
     */
    public function afterAdd($model, $input)
    {

    }

    /**
     * 更新之后
     * @param $model
     * @param $input
     */
    public function afterUpdate($model, $input)
    {

    }

    /**
     * 验证规则
     * @return array
     */
    public function verifyRules()
    {
        return [];
    }

    /**
     * 验证提示
     * @return array
     */
    public function verifyMessages()
    {
        return [];
    }

    /**
     * 删除操作
     * @param $id
     * @param $jumpRoute
     * @return array
     */
    public function del($id, $jumpRoute)
    {
        try {
            $this->model::find($id)->delete();
            session()->flash('msg', '删除成功！');
            return $this->successfulResponse(['删除成功！', $jumpRoute]);
        } catch (\Throwable $e) {
            return $this->failedResponse([$this->exceptionMsg($e)]);
        }
    }
}
