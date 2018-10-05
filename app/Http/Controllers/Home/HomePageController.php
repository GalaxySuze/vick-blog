<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use App\Models\Category;
use App\Models\Label;
use App\Models\Link;
use App\Support\Helper;
use App\Support\MarkdownSupport;
use App\Support\SolarTermSupport;
use App\Traits\Toolkit;
use App\Support\UploadSupport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    use Toolkit;
    const CHUNK_NUMBER = 4;
    const DEFAULT_COVER = 'http://pfkea6mu4.bkt.clouddn.com/soul_20181001_master_01.jpg';
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
    public function __construct(UploadSupport $uploadSupport, MarkdownSupport $markdownSupport, SolarTermSupport $solarTermSupport)
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
            'index' => true,
            'linkList' => Link::all()
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function articlesList(Request $request)
    {
        return view('home.layouts.main.card-list', [
            'articles' => $this->getArticleList($request->all())
        ]);
    }

    /**
     * @param array $where
     * @return mixed
     */
    public function getArticleList($where = [])
    {
        $articleModel = Article::getReleaseArticles($where)->toArray();
        $articleModel['data'] = $this->handleDisplay($articleModel['data']);
        return $articleModel;
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
        return collect($item)->map(function ($v, $k) use ($STSupport, $uploadSupport, $categories, $tags) {
            $pageImg = $v['page_image'] ? $v['page_image'] : self::DEFAULT_COVER;
            if (Article::IMG_SAVE_LOCAL) {
                $pageImg = $v['page_image'] ? $v->setFileUrl($v['page_image'], true) : self::DEFAULT_COVER;
            }
            $v['page_image'] = $pageImg;
            $v['category'] = $categories[$v['category']];
            $v['release_time'] = $STSupport->getSolarTerm($v['release_time']);
            $labels = $v['label']['labels'];
            foreach ($labels as $key => $label) {
                $labels[$key] = $tags[$label];
            }
            $v['label'] = $labels;
            return $v;
        })->toArray();
    }
}
