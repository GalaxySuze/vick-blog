<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
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
        Article::find($id)->increment('views');
        return view('home.detail', [
            'detail' => $this->handlePostView($id)
        ]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function handlePostView($id)
    {
        $categories = Helper::modelAll(Category::class);
        $tags = Helper::modelAll(Label::class);
        $postModel = $this->model::getModelData(['id' => $id])->toArray();
        if (!$postModel) {
            abort(404);
        }
        list($post) = $postModel;
        $post['created_user'] = empty($post['created_user']) ? '用户已注销' : $post['created_user'];
        $post['category'] = $categories[$post['category']];
        $post['release_time_pop'] = Carbon::parse($post['release_time'])->diffForHumans();
        $labels = $post['label']['labels'];
        foreach ($labels as $key => $label) {
            $labels[$key] = $tags[$label];
        }
        $post['label'] = $labels;
        $commentService = new CommentController();
        list($commentsCount, $articleComments) = $commentService->getComments($id);
        $post['comments_count'] = $commentsCount;
        $post['comments'] = $articleComments;
        return $post;
    }
}
