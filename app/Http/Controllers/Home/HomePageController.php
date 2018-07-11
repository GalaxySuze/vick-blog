<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use App\Models\Category;
use App\Models\Label;
use App\Support\Helper;
use App\Support\MarkdownSupport;
use App\Support\UploadSupport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomePageController extends Controller
{
    public $uploadSupport;
    public $mdSupport;

    public function __construct(UploadSupport $uploadSupport, MarkdownSupport $markdownSupport)
    {
        $this->uploadSupport = $uploadSupport;
        $this->mdSupport = $markdownSupport;
    }

    public function homePage()
    {
        $article = Article::getArticleList()->groupBy('category')->toArray();
        $articles = $this->handleDisplay($article);
        return view('home.home', [
            'articles' => $articles
        ]);
    }

    public function handleDisplay($list)
    {
        $categories = Helper::modelAll(Category::class);
        $tags = Helper::modelAll(Label::class);
        $uploadSupport = $this->uploadSupport;
        foreach ($list as &$items) {
            $items = collect($items)->map(function ($v, $k) use ($uploadSupport, $categories, $tags) {
                $v['page_image'] = $uploadSupport->setFileUrl($v['page_image'], true);
                $v['category'] = $categories[$v['category']];
                foreach ($v['label'] as $key => $label) {
                    $v['label'][$key] = $tags[$label];
                }
                return $v;
            })->toArray();
        }
        return $list;
    }
}
