<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'desc',
    ];

    /**
     * @param array $conditions
     * @param int $offset
     * @param int $limit
     * @return mixed
     */
    public static function getCategories($conditions = [], $offset = 1, $limit = 10)
    {
        $query = Category::orderBy('categories.updated_at', 'desc');
        if (!empty($conditions['name'])) {
            $query->where('name', 'like', '%' . $conditions['name'] . '%');
        }
        if (!empty($conditions['id'])) {
            return $query->find($conditions['id']);
        }
        $data = $query
            ->offset(($offset - 1) * $limit)
            ->limit($limit)
            ->get();
        return $data;
    }
}
