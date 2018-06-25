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

    public static function getCategories($conditions = [])
    {
        $query = Category::orderBy('categories.updated_at', 'desc');
        if (!empty($conditions['name'])) {
            $query->where('name', 'like', '%' . $conditions['name'] . '%');
        }
        if (!empty($conditions['id'])) {
            return $query->find($conditions['id']);
        }
        $data = $query->get();
        return $data;
    }
}
