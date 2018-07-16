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
        'original_content',
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
        'outline',
    ];
    protected $casts = [
        'label' => 'array',
        'outline' => 'array',
    ];

    /**
     * @param array $conditions
     * @param int $offset
     * @param int $limit
     * @return mixed
     */
    public static function getArticles($conditions = [], $offset = 1, $limit = 10)
    {
        $query = Article::leftJoin('users', 'users.id', '=', 'articles.user_id')
            ->orderBy('articles.updated_at', 'desc');
        if (!empty($conditions['title'])) {
            $query->where('articles.title', 'like', '%' . $conditions['title'] . '%');
        }
        if (!empty($conditions['keyword'])) {
            $query->where('articles.keyword', 'like', '%' . $conditions['keyword'] . '%');
        }
        if (!empty($conditions['category']) && $conditions['category'] != 0) {
            $query->where('articles.category', $conditions['category']);
        }
        if (!empty($conditions['status'])) {
            $query->whereIn('articles.status', $conditions['status']);
        }
        if (!empty($conditions['id'])) {
            $query->where('articles.id', $conditions['id']);
        }
        $data = $query
            ->offset(($offset - 1) * $limit)
            ->limit($limit)
            ->get(['articles.*', 'users.name as created_user']);
        return $data;
    }

    public static function getArticleList()
    {
        return Article::where('status', '<>', Article::ARTICLE_STATUS_DRAFT)
            ->orderBy('release_time', 'desc')
            ->get();
    }
}
