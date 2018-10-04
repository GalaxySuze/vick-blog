<?php

namespace App\Http\Controllers\Backstage;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    protected $master = 'role';
    protected $formEvent = 'roleForm';
    protected $tableName = 'RoleTableService';
    protected $searchBarName = 'RoleSearchService';
    protected $formName = 'RoleFormService';
    protected $model = Role::class;

    /**
     * @param $data
     */
    public function handleDataDisplay(&$data)
    {
        if ($data) {
            $data->each(function ($item, $key) {
                $item->editRoute = route($this->routeConf['editPage'], $item->id);
                $item->delRoute = route($this->routeConf['del'], $item->id);
                $item->is_backstage = Role::$isBackstage[$item->is_backstage];
                $item->allowEdit = true;
                $item->allowDel = true;
            });
        }
    }

    /**
     * @param $input
     */
    public function beforeAdd(&$input)
    {
        $input['create_user_id'] = Auth::id();
    }

    /**
     * @return array
     */
    public function validateRules()
    {
        return [
            'role_name' => 'required|max:255',
        ];
    }

    /**
     * @return array
     */
    public function validateMessages()
    {
        return [
            'role_name.required' => '请输入「角色」.',
        ];
    }

    /**
     * @param $id
     * @return array
     */
    public function delRole($id)
    {
        return parent::del($id, route($this->routeConf['list']));
    }
}
