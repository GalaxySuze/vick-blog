<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Label extends Model
{
    use SoftDeletes;

    protected $table = 'labels';

    protected $fillable = [
        'label',
        'desc',
        'label_icon'
    ];

    public static function getLabels($conditions = [])
    {
        $query = Label::orderBy('labels.updated_at', 'desc');
        if (!empty($conditions['id'])) {
            $query->whereIn('id', $conditions['id']);
        }
        if (!empty($conditions['label'])) {
            $query->where('label', 'like', '%' . $conditions['label'] . '%');
        }
        $data = $query->get();
        return $data;
    }
}
