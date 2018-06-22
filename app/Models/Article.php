<?php

namespace App\Models;

use App\Services\SearchServices\BaseBuildSearchService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    const ARTICLE_STATUS_DRAFT = 0;
    const ARTICLE_STATUS_NORMAL = 1;
    const ARTICLE_STATUS_TOP = 2;

    public static $statusConf = [
        self::ARTICLE_STATUS_DRAFT => '草稿',
        self::ARTICLE_STATUS_NORMAL => '正常',
        self::ARTICLE_STATUS_TOP => '置顶',
    ];
    protected $table = 'articles';
    protected $fillable = [
        'title',
        'content',
        'page_image',
        'desc',
        'link',
        'status',
        'is_original',
        'user_id',
        'category',
        'label',
        'release_time',
        'keyword',
    ];
    protected $casts = [
        'label' => 'array',
    ];

    public static function getArticles($conditions = [])
    {
        $query = Article::leftJoin('users', 'users.id', '=', 'articles.user_id')
            ->orderBy('articles.updated_at', 'desc');
        if (!empty($conditions['title'])) {
            $query->where('title', 'like', '%' . $conditions['title'] . '%');
        }
        if (!empty($conditions['keyword'])) {
            $query->where('keyword', 'like', '%' . $conditions['keyword'] . '%');
        }
        if (!empty($conditions['category']) && $conditions['category'] != 0) {
            $query->where('category', $conditions['category']);
        }
        $data = $query->get(['articles.*', 'users.name as created_user']);
        return $data;
    }
}