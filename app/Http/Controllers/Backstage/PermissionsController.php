<?php

namespace App\Http\Controllers\Backstage;

use App\Models\Permissions;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PermissionsController extends Controller
{
    protected $master = 'permissions';
    protected $formEvent = 'permissionsForm';
    protected $tableName = 'PermissionsTableService';
    protected $searchBarName = 'PermissionsSearchService';
    protected $formName = 'PermissionsFormService';
    protected $model = Permissions::class;

    /**
     * @param $data
     */
    public function handleDataDisplay(&$data)
    {
        if ($data) {
            $data->each(function ($item, $key) {
                $item->editRoute = route($this->routeConf['editPage'], $item->id);
                $item->delRoute = route($this->routeConf['del'], $item->id);
                $item->role_name = optional(Role::find($item->role_id))->role_name;
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
            'perm_name' => 'required|max:255',
            'role_id' => 'required',
        ];
    }

    /**
     * @return array
     */
    public function validateMessages()
    {
        return [
            'perm_name.required' => '请输入「权限名称」.',
            'role_id.required' => '请选择「角色」.',
        ];
    }

    /**
     * @param $id
     * @return array
     */
    public function delPermissions($id)
    {
        return parent::del($id, route($this->routeConf['list']));
    }
}
