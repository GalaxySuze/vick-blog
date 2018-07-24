<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use App\Support\SolarTermSupport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TimeLineController extends Controller
{
    public $solarTerm;
    public $articleService;

    public function __construct(SolarTermSupport $solarTermSupport, HomePageController $homePageController)
    {
        $this->solarTerm = $solarTermSupport;
        $this->articleService = $homePageController;
    }

    public function timeLinePage()
    {
        return view('home.time-line', [
            'yearTimeline' => $this->getYearTimeLine(),
            'monthTimeline' => $this->getMonthTimeLine(),
            'articleList' => $this->getMonthTimeLine(),
        ]);
    }

    /**
     * @return array
     */
    public function getYearTimeLine()
    {
        $startY = $this->setTimeCarbon(
            Article::getOrderByFields('release_time'), 'release_time'
        );
        $endY = $this->setTimeCarbon(
            Article::getOrderByFields('release_time', 'desc'), 'release_time'
        );
        $yearList = [];
        for ($i = 0; $i <= $startY->diffInYears($endY); $i++) {
            $yearList[] = date('Y', $startY->addYear($i)->getTimestamp());
        }
        return $yearList;
    }

    public function setTimeCarbon($model, $timeField)
    {
        return Carbon::parse(
            optional($model)->{$timeField}
        );
    }

    /**
     * @return array
     */
    public function getMonthTimeLine()
    {
        $monthList = $this->solarTerm->months;
        foreach ($monthList as $monthNo => &$monthStr) {
            $monthStr['en'] = $monthStr['en'] . '_' . $monthNo;
        }
        return $monthList;
    }

    public function timeLineArticles(Request $request)
    {
        $year = $request->year;
        $monthTmp = explode('_', $request->month);
        $month = end($monthTmp);
        $articleList = Article::where('release_time', 'like', "{$year}-{$month}%")->get()->toArray();
        $articles = $this->articleService->displayProcess($articleList);
        return view('home.layouts.main.across-card-list', ['articles' => $articles]);
    }
}
