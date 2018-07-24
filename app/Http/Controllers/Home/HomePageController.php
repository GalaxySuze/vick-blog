<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use App\Models\Category;
use App\Models\Label;
use App\Support\Helper;
use App\Support\MarkdownSupport;
use App\Support\SolarTermSupport;
use App\Support\ToolkitSupport;
use App\Support\UploadSupport;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class HomePageController extends Controller
{
    use ToolkitSupport;
    const CHUNK_NUMBER = 4;
    const DEFAULT_COVER = 'img/soul.jpg';
    /**
     * @var UploadSupport
     */
    public $uploadSupport;
    /**
     * @var MarkdownSupport
     */
    public $MDSupport;
    /**
     * @var SolarTermSupport
     */
    public $STSupport;

    /**
     * HomePageController constructor.
     * @param UploadSupport $uploadSupport
     * @param MarkdownSupport $markdownSupport
     * @param SolarTermSupport $solarTermSupport
     */
    public function __construct(
        UploadSupport $uploadSupport,
        MarkdownSupport $markdownSupport,
        SolarTermSupport $solarTermSupport
    )
    {
        $this->uploadSupport = $uploadSupport;
        $this->MDSupport = $markdownSupport;
        $this->STSupport = $solarTermSupport;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function homePage()
    {
        return view('home.home', [
            'articles' => $this->getArticleList()
        ]);
    }

    /**
     * @return array
     */
    public function getArticleList()
    {
        return $this->handleDisplay(
            Article::getReleaseArticles()->toArray()
        );
    }

    /**
     * @param $list
     * @return array
     */
    public function handleDisplay($list)
    {
        return $this->sliceArray(
            $this->displayProcess($list),
            self::CHUNK_NUMBER
        );
    }

    /**
     * @param $item
     * @return array
     */
    public function displayProcess($item)
    {
        $categories = Helper::modelAll(Category::class);
        $tags = Helper::modelAll(Label::class);
        $uploadSupport = $this->uploadSupport;
        $STSupport = $this->STSupport;
        return collect($item)->map(function ($v, $k) use (
            $STSupport, $uploadSupport, $categories, $tags
        ) {
            $v['page_image'] = $v['page_image'] ? $uploadSupport->setFileUrl($v['page_image'], true)
                : app('url')->asset(self::DEFAULT_COVER);
            $v['category'] = $categories[$v['category']];
            $v['release_time'] = $STSupport->getSolarTerm($v['release_time']);
            foreach ($v['label'] as $key => $label) {
                $v['label'][$key] = $tags[$label];
            }
            return $v;
        })->toArray();
    }
}
