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
     * @param array $conditions
     * @param int $offset
     * @param int $limit
     * @return mixed
     */
    public static function getLabels($conditions = [], $offset = 1, $limit = 10)
    {
        $query = Label::orderBy('labels.updated_at', 'desc');
        if (!empty($conditions['id'])) {
            $query->whereIn('id', $conditions['id']);
        }
        if (!empty($conditions['label'])) {
            $query->where('label', 'like', '%' . $conditions['label'] . '%');
        }
        $data = $query
            ->offset(($offset - 1) * $limit)
            ->limit($limit)->get();
        return $data;
    }

}
