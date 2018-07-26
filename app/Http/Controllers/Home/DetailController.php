<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use App\Models\Category;
use App\Models\Label;
use App\Support\Helper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailController extends Controller
{
    /**
     * @var Article
     */
    public $model;

    /**
     * DetailController constructor.
     * @param Article $article
     */
    public function __construct(Article $article)
    {
        $this->model = $article;
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail($id)
    {
        $categories = Helper::modelAll(Category::class);
        $tags = Helper::modelAll(Label::class);
        list($post) = $this->model::getModelData(['id' => $id])->toArray();
        $post['category'] = $categories[$post['category']];
        $post['release_time_str'] = Carbon::parse($post['release_time'])->diffForHumans();
        foreach ($post['label'] as $key => $label) {
            $post['label'][$key] = $tags[$label];
        }
        return view('home.detail', ['detail' => $post]);
    }
}
