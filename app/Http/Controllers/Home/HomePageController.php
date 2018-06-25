<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomePageController extends Controller
{
    public function __construct()
    {

    }

    public function homePage()
    {
        dd($this->articlesCardList());
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
        foreach ($articles as $item) {
            $count = $articles->count();
            if ($count <= 4) {
                $articleList[] = [
                    $item
                ];
            } elseif ($count <= 2) {

            }
        }
        dd($articles);
    }
}
