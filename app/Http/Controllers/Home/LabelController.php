<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use App\Models\Label;
use App\Support\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LabelController extends Controller
{
    /**
     * @var HomePageController
     */
    public $articleService;

    /**
     * LabelController constructor.
     * @param HomePageController $homePageController
     */
    public function __construct(HomePageController $homePageController)
    {
        $this->articleService = $homePageController;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function labelPage(Request $request)
    {
        return view('home.label', [
            'labelList' => $this->getLabelList(),
            'selectedLabel' => $request->label ?? null,
        ]);
    }

    /**
     * @return mixed
     */
    public function getLabelList()
    {
        return $this->handleDisplay(
            Helper::modelAll(Label::class)
        );
    }

    /**
     * @param $list
     * @return mixed
     */
    public function handleDisplay($list)
    {
        $articlesCount = [];
        $articles = Article::where('status', '<>', Article::ARTICLE_STATUS_DRAFT)->get(['id', 'status','label'])->toArray();
        foreach ($articles as $item) {
            foreach (array_get($item, 'label.labels') as $labelTime) {
                if (array_key_exists($labelTime, $articlesCount)) {
                    $articlesCount[$labelTime]['count'] ++;
                } else {
                    $articlesCount[$labelTime]['count'] = 1;
                }
            }
        }
        foreach ($list as $labelId => &$labelItem) {
            $labelItem['articleTotal'] = $articlesCount[$labelId]['count'] ?? 0;
        }
        return $list;
    }
}
