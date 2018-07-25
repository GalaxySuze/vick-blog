<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Label extends BaseModel
{
    use SoftDeletes;

    protected $table = 'labels';

    protected $fillable = [
        'label',
        'desc',
        'label_icon'
    ];

    /**
     * @param array ...$arguments
     * @return mixed
     */
    public static function getModelData(...$arguments)
    {
        self::modelBuild(Label::class);
        self::$instance->argumentParse($arguments);
        return self::$instance->modelProcess();
    }

    /**
     * @return mixed
     */
    public static function modelProcess()
    {
        self::$instance->query = Label::orderBy('labels.updated_at', 'desc');
        self::$instance->filterAndPagination();
        return self::$instance->query->get();
    }

    /**
     * @param $value
     */
    public function labelFilter($value)
    {
        $this->query->where('label', 'like', '%' . $value . '%');
    }

    /**
     * @param $value
     */
    public function idFilter($value)
    {
        $this->query->whereIn('id', $value);
    }

}
