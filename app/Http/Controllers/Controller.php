<?php

namespace App\Http\Controllers;

use App\Support\Helper;
use App\Traits\ResponseHelper;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, ResponseHelper;

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
     * 删除记录
     * @param $model
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

    /**
     * 美化错误信息
     * @param $e
     * @return string
     */
    public function exceptionMsg($e)
    {
        $msg = '操作发生错误!';
        if (env('APP_DEBUG')) {
            $msg = '[错误信息]: ' . $e->getMessage() . '<br/>';
            $msg .= '[错误行数]: ' . $e->getLine() . '<br/>';
            $msg .= '[错误文件]: ' . $e->getFile();
        }
        return $msg;
    }

    /**
     * 实例依赖类
     * @param $support
     * @return mixed
     */
    public function setSupport($support)
    {
        return new $support();
    }
}
