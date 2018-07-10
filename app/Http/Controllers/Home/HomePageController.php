<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use App\Support\UploadSupport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomePageController extends Controller
{
    public function __construct()
    {

    }

    public function homePage()
    {
        return view('home.home', [
            'articles' => $this->articlesCardList()
        ]);
    }

    public function articlesCardList()
    {
        $articles = Article::where('status', '<>', Article::ARTICLE_STATUS_DRAFT)
            ->orderBy('release_time', 'desc')
            ->get();
        $articleList = [];
        // 瀑布流计算
        foreach ($articles as $item) {
            if (array_key_exists($item->category, $articleList)) {
                $articleList[$item->category][] = $item->toArray();
            } else {
                $articleList[$item->category][] = $item->toArray();
            }
        }
        return $articleList;
    }

    public function handleDisplay($list)
    {
        $uploadSupport = new UploadSupport();
        foreach ($list as &$v) {
            $v['page_image'] = $uploadSupport->setFileUrl($v['page_image'], true);
        }
        return $list;
    }
}
