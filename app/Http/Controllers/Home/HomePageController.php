<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use App\Models\Category;
use App\Models\Label;
use App\Support\Helper;
use App\Support\MarkdownSupport;
use App\Support\SolarTermSupport;
use App\Support\UploadSupport;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class HomePageController extends Controller
{
    public $uploadSupport;
    public $MDSupport;
    public $STSupport;

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

    public function homePage()
    {
        return view('home.home', [
            'articles' => $this->handleDisplay(
                Article::getArticleList()->groupBy('category')->toArray()
            )
        ]);
    }

    public function handleDisplay($list)
    {
        $categories = Helper::modelAll(Category::class);
        $tags = Helper::modelAll(Label::class);
        $uploadSupport = $this->uploadSupport;
        $STSupport = $this->STSupport;
        foreach ($list as &$items) {
            $items = collect($items)->map(function ($v, $k) use (
                $STSupport, $uploadSupport, $categories, $tags
            ) {
                $v['page_image'] = $uploadSupport->setFileUrl($v['page_image'], true);
                $v['category'] = $categories[$v['category']];
                $v['release_time'] = $STSupport->getSolarTerm($v['release_time']);
                foreach ($v['label'] as $key => $label) {
                    $v['label'][$key] = $tags[$label];
                }
                return $v;
            })->toArray();
        }
        return $list;
    }
}
