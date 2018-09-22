<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends BaseModel
{
    use SoftDeletes;

    protected $table = 'labels';

    protected $fillable = [
        'nickname',
        'email',
        'content',
        'target',
        'reply_comment_id',
        'comment_type',
        'ip',
        'thumb',
    ];
}
