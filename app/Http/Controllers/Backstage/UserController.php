<?php

namespace App\Http\Controllers\Backstage;

use App\Models\Role;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $master = 'user';
    protected $formEvent = 'userForm';
    protected $tableName = 'UserTableService';
    protected $searchBarName = 'UserSearchService';
    protected $formName = 'UserFormService';
    protected $model = User::class;

    /**
     * @param $data
     */
    public function handleDataDisplay(&$data)
    {
        if ($data) {
            $data->each(function ($item, $key) {
                $item->editRoute = route($this->routeConf['editPage'], $item->id);
                $item->delRoute = route($this->routeConf['del'], $item->id);
                $item->status = User::$userStatus[$item->status];
                $item->is_admin = $item->is_admin ? '是' : '否';
                $item->email_notify_enabled = $item->email_notify_enabled ? '是' : '否';
                $item->role_name = optional(Role::find($item->role_id))->role_name;
                $item->allowEdit = true;
                $item->allowDel = true;
            });
        }
    }

    /**
     * @param $input
     */
    public function inputFilter(&$input)
    {
        $input['is_admin'] = isset($input['is_admin']) ? true : false;
        $input['email_notify_enabled'] = isset($input['email_notify_enabled']) ? true : false;
        $input['password'] = Hash::make($input['password']);
    }

    /**
     * @return array
     */
    public function validateRules()
    {
        return [
            'name' => 'required|max:20',
            'email' => 'required|email|max:255',
            'password' => 'required|max:50',
        ];
    }

    /**
     * @param $id
     * @return array
     */
    public function delUser($id)
    {
        return parent::del($id, route($this->routeConf['list']));
    }
}
