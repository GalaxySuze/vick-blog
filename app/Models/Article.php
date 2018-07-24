<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends BaseModel
{
    use SoftDeletes;

    const ARTICLE_STATUS_DRAFT = 1;
    const ARTICLE_STATUS_NORMAL = 2;
    const ARTICLE_STATUS_TOP = 3;
    /**
     * @var array
     */
    public static $statusConf = [
        self::ARTICLE_STATUS_DRAFT => '草稿',
        self::ARTICLE_STATUS_NORMAL => '正常',
        self::ARTICLE_STATUS_TOP => '置顶',
    ];
    /**
     * @var string
     */
    protected $table = 'articles';
    /**
     * @var array
     */
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
    /**
     * @var array
     */
    protected $casts = [
        'label' => 'array',
        'outline' => 'array',
    ];

    /**
     * @return mixed
     */
    public static function getReleaseArticles()
    {
        return Article::where('status', '<>', Article::ARTICLE_STATUS_DRAFT)
            ->orderBy('release_time', 'desc')
            ->get();
    }

    /**
     * @param $fields
     * @param string $orderBy
     * @return mixed
     */
    public static function getOrderByFields($fields, $orderBy = 'asc')
    {
        return Article::orderBy($fields, $orderBy)->first([$fields]);
    }

    /**
     * @param array $conditions
     * @param int $offset
     * @param int $limit
     * @return mixed
     */
    public function getArticles($conditions = [], $offset = 1, $limit = 10)
    {
        $this->query = Article::leftJoin('users', 'users.id', '=', 'articles.user_id')
            ->orderBy('articles.updated_at', 'desc');
        $this->withFilter($conditions)->pagination($offset, $limit);
        return $this->query->get(['articles.*', 'users.name as created_user']);
    }

    /**
     * @param $value
     */
    public function titleFilter($value)
    {
        $this->query->where('articles.title', 'like', '%' . $value . '%');
    }

    /**
     * @param $value
     */
    public function keywordFilter($value)
    {
        $this->query->where('articles.keyword', 'like', '%' . $value . '%');
    }

    /**
     * @param $value
     */
    public function categoryFilter($value)
    {
        $this->query->where('articles.category', $value);
    }

    /**
     * @param $value
     */
    public function statusFilter($value)
    {
        $this->query->where('articles.status', $value);
    }

    /**
     * @param $value
     */
    public function labelFilter($value)
    {
        $this->query->where('articles.label', 'like', '%' . $value . '%');
    }

    /**
     * @param $value
     */
    public function idFilter($value)
    {
        $this->query->where('articles.id', $value);
    }
}
