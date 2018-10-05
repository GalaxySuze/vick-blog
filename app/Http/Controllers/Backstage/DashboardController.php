<?php

namespace App\Http\Controllers\Backstage;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * DashboardController constructor.
     */
    public function __construct()
    {
        // 不需要增删改查类直接重新父类构造
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //TODO: 站内信通知
        $weekArticles = $this->getWeekArticles();
        $weekNotRelease = $this->getNotReleaseArticles();
        $weekComments = $this->getWeekComments();
        $articleViews = $this->getArticleViews();
        $articlesList = $this->getIndexArticlesList();
//        dd($articlesList);
        return view('backstage.dashboard', [
            'weekArticles' => $weekArticles,
            'weekNotRelease' => $weekNotRelease,
            'weekComments' => $weekComments,
            'articleViews' => $articleViews,
            'articlesList' => $articlesList,
        ]);
    }

    /**
     * @return Article[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getIndexArticlesList()
    {
        $data = Article::orderBy('release_time', 'desc')->get();
        $dataList = [];
        if ($data) {
            $dataList = $data->each(function ($item, $key) {
                $item->release_humans = Carbon::parse($item->created_at)->diffForHumans();
                $item->release_year = Carbon::parse($item->created_at)->year;
                $item->release_month = Carbon::parse($item->created_at)->month;
                $item->release_day = Carbon::parse($item->created_at)->day;
                $item->category = optional(Category::find($item->category))->name;
            })->groupBy('created_year')->toArray();
        }
        return $dataList;
    }

    /**
     * @return mixed
     */
    public function getWeekArticles()
    {
        list($weekStart, $weekEnd) = $this->getWeekStartAndEndDate();
        $weekArticles = Article::whereBetween('created_at', [$weekStart, $weekEnd])->count();
        return $weekArticles;
    }

    /**
     * @return array
     */
    public function getWeekStartAndEndDate()
    {
        $weekStart = Carbon::now()->startOfWeek()->toDateTimeString();
        $weekEnd = Carbon::now()->endOfWeek()->toDateTimeString();
        return [$weekStart, $weekEnd];
    }

    /**
     * @return mixed
     */
    public function getNotReleaseArticles()
    {
        $notRelease = Article::where('status', Article::ARTICLE_STATUS_DRAFT)->count();
        return $notRelease;
    }

    /**
     * @return mixed
     */
    public function getWeekComments()
    {
        list($weekStart, $weekEnd) = $this->getWeekStartAndEndDate();
        $weekComments = Comment::whereBetween('created_at', [$weekStart, $weekEnd])->count();
        return $weekComments;
    }

    /**
     * @return mixed
     */
    public function getArticleViews()
    {
        $articleViews = Article::all()->sum('views');
        return $articleViews;
    }
}
