<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use App\Support\SolarTermSupport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TimeLineController extends Controller
{
    const DATA_SEPARATOR = '-';
    /**
     * @var SolarTermSupport
     */
    public $solarTerm;
    /**
     * @var HomePageController
     */
    public $articleService;

    /**
     * TimeLineController constructor.
     * @param SolarTermSupport $solarTermSupport
     * @param HomePageController $homePageController
     */
    public function __construct(SolarTermSupport $solarTermSupport, HomePageController $homePageController)
    {
        $this->solarTerm = $solarTermSupport;
        $this->articleService = $homePageController;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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

    /**
     * @param $model
     * @param $timeField
     * @return Carbon
     */
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
            $monthStr['en'] = $monthStr['en'] . self::DATA_SEPARATOR . $monthNo;
        }
        return $monthList;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function timeLineArticles(Request $request)
    {
        $year = $request->year;
        $monthTmp = explode(self::DATA_SEPARATOR, $request->month);
        $month = end($monthTmp);
        $data = Article::getTimeLineArticles("{$year}-{$month}");
        $articleList = $data->toArray();
        if (!empty($articleList['data'])) {
            $articleList['data'] = $this->articleService->displayProcess($articleList['data']);
        }
        return view('home.layouts.main.across-card-list', [
            'totalQty' => $data->count(),
            'articles' => $articleList,
        ]);
    }
}
