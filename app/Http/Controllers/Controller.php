<?php

namespace App\Http\Controllers;

use App\Support\ResponseSupport;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use ResponseSupport;

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $tableServices = 'App\Services\TableServices\\';

    protected $formServices = 'App\Services\FormServices\\';

    protected $searchServices = 'App\Services\SearchServices\\';

    public function del($model, $id, $jumpRoute)
    {
        try {
            $model::find($id)->delete();
            session()->flash('msg', '删除成功！');
            return $this->successfulResponse(['删除成功！', $jumpRoute]);
        } catch (\Throwable $e) {
            $getError = env('APP_DEBUG') ? $e->getMessage() : '删除失败!';
            return $this->failedResponse([$getError]);
        }
    }
}
