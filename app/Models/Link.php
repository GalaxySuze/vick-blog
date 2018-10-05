<?php

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;

class Link extends BaseModel
{
    use SoftDeletes;

    // 友链状态
    const LINK_STATUS_NORMAL = 1;
    const LINK_STATUS_DISABLED = 2;

    public static $linkStatus = [
        self::LINK_STATUS_NORMAL => '正常',
        self::LINK_STATUS_DISABLED => '禁用',
    ];
    protected $table = 'links';
    protected $fillable = [
        'name',
        'link',
        'image',
        'status',
    ];

    /**
     * @param array ...$arguments
     * @return mixed
     */
    public static function getModelData(...$arguments)
    {
        self::modelBuild(Link::class);
        self::$instance->argumentParse($arguments);
        return self::$instance->modelProcess();
    }

    /**
     * @return mixed
     */
    public static function modelProcess()
    {
        self::$instance->query = Link::orderBy('links.updated_at', 'desc');
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
    public function linkFilter($value)
    {
        $this->query->where('link', 'like', '%' . $value . '%');
    }

    /**
     * @param $value
     */
    public function statusFilter($value)
    {
        $this->query->where('status', $value);
    }
}
