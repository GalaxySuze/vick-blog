<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends BaseModel
{
    use SoftDeletes;

    //文章状态
    const ARTICLE_STATUS_DRAFT = 1;
    const ARTICLE_STATUS_NORMAL = 2;
    const ARTICLE_STATUS_TOP = 3;
    //分页数
    const PAGE_NUMBER = 12;
    /**
     * 是否支持封面本地上传下载驱动
     * false = 使用图床外链
     */
    const IMG_SAVE_LOCAL = false;
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
     * @param array $where
     * @param int $page
     * @return mixed
     */
    public static function getReleaseArticles($where = [], $page = self::PAGE_NUMBER)
    {
        $query = Article::where('status', '<>', Article::ARTICLE_STATUS_DRAFT)->orderBy('release_time', 'desc');
        if (!empty($where['label'])) {
            $query->whereRaw('json_contains(label, ?, "$.labels")', $where['label']);
        }
        if (!empty($where['desc'])) {
            $searchContent = $where['desc'];
            $query->where(function ($orQuery) use ($searchContent) {
                $orQuery->where('desc', 'like', "%$searchContent%")->orWhere('title', 'like', "%$searchContent%");
            });
        }
        return $query->paginate($page);
    }

    /**
     * @param $releaseTime
     * @param int $page
     * @return mixed
     */
    public static function getTimeLineArticles($releaseTime, $page = 10)
    {
        //TODO: 页面时间轴分页
        $page = Article::count();
        return Article::where('release_time', 'like', "$releaseTime%")->paginate($page);
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
     * @param array ...$arguments
     * @return mixed
     */
    public static function getModelData(...$arguments)
    {
        self::modelBuild(Article::class);
        self::$instance->argumentParse($arguments);
        return self::$instance->modelProcess();
    }

    /**
     * @return mixed
     */
    public static function modelProcess()
    {
        self::$instance->query = Article::leftJoin('users', 'users.id', '=', 'articles.user_id')
            ->orderBy('articles.updated_at', 'desc');
        self::$instance->filterAndPagination();
        return self::$instance->query->get(['articles.*', 'users.name as created_user']);
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
        $this->query->where('articles.label', 'like', "%, $value,%");
    }

    /**
     * @param $value
     */
    public function idFilter($value)
    {
        $this->query->where('articles.id', $value);
    }
}
