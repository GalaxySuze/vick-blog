<?php

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends BaseModel
{
    use SoftDeletes;

    const IS_BACKSTAGE_COMMON = 1;
    const IS_BACKSTAGE_ADMIN = 2;

    protected $table = 'roles';

    protected $fillable = [
        'role_name',
        'role_desc',
        'is_backstage',
        'create_user_id',
    ];

    public static $isBackstage = [
        self::IS_BACKSTAGE_COMMON => '前台',
        self::IS_BACKSTAGE_ADMIN => '后台',
    ];

    /**
     * @param array ...$arguments
     * @return mixed
     */
    public static function getModelData(...$arguments)
    {
        self::modelBuild(Role::class);
        self::$instance->argumentParse($arguments);
        return self::$instance->modelProcess();
    }

    /**
     * @return mixed
     */
    public static function modelProcess()
    {
        self::$instance->query = Role::orderBy('roles.updated_at', 'desc');
        self::$instance->filterAndPagination();
        return self::$instance->query->get();
    }

    /**
     * @param $value
     */
    public function roleNameFilter($value)
    {
        $this->query->where('role_name', 'like', '%' . $value . '%');
    }

    /**
     * @param $value
     */
    public function isBackstageFilter($value)
    {
        $this->query->where('is_backstage', $value);
    }

}
