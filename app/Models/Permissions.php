<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Permissions extends BaseModel
{
    use SoftDeletes;

    protected $table = 'permissions';

    protected $fillable = [
        'perm_name',
        'perm_desc',
        'role_id',
        'create_user_id',
    ];

    /**
     * @param array ...$arguments
     * @return mixed
     */
    public static function getModelData(...$arguments)
    {
        self::modelBuild(Permissions::class);
        self::$instance->argumentParse($arguments);
        return self::$instance->modelProcess();
    }

    /**
     * @return mixed
     */
    public static function modelProcess()
    {
        self::$instance->query = Permissions::orderBy('permissions.updated_at', 'desc');
        self::$instance->filterAndPagination();
        return self::$instance->query->get();
    }

    /**
     * @param $value
     */
    public function permNameFilter($value)
    {
        $this->query->where('perm_name', 'like', '%' . $value . '%');
    }

    /**
     * @param $value
     */
    public function roleIdFilter($value)
    {
        $this->query->where('role_id', $value);
    }
}
