<?php

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;

class User extends BaseModel
{
    use SoftDeletes;

    // 前台/后台
    const IS_BACKSTAGE_COMMON = 1;
    const IS_BACKSTAGE_ADMIN = 2;

    // 用户状态值
    const USER_STATUS_NORMAL = 1;
    const USER_STATUS_DISABLED = 2;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'nickname',
        'avatar',
        'email',
        'password',
        'status',
        'is_admin',
        'role_id',
        'email_notify_enabled',
        'remember_token',
    ];

    /**
     * @var array
     */
    public static $userStatus = [
        self::USER_STATUS_NORMAL => '正常',
        self::USER_STATUS_DISABLED => '禁用',
    ];

    /**
     * @param array ...$arguments
     * @return mixed
     */
    public static function getModelData(...$arguments)
    {
        self::modelBuild(User::class);
        self::$instance->argumentParse($arguments);
        return self::$instance->modelProcess();
    }

    /**
     * @return mixed
     */
    public static function modelProcess()
    {
        self::$instance->query = User::orderBy('users.updated_at', 'desc');
        self::$instance->filterAndPagination();
        return self::$instance->query->get();
    }

    /**
     * @param $value
     */
    public function nameFilter($value)
    {
        $this->query->where('name', 'like', '%' . $value . '%');
    }

    /**
     * @param $value
     */
    public function emailFilter($value)
    {
        $this->query->where('email', 'like', '%' . $value . '%');
    }

    /**
     * @param $value
     */
    public function roleIdFilter($value)
    {
        $this->query->where('role_id', $value);
    }
}
