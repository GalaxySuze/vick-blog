<?php

namespace App\Http\Controllers\Backstage;

use App\Models\Article;
use App\Models\Comment;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    protected $master = 'comment';
    protected $formEvent = 'commentForm';
    protected $tableName = 'CommentTableService';
    protected $searchBarName = 'CommentSearchService';
    protected $formName = 'CommentFormService';
    protected $model = Comment::class;

    /**
     * @param $data
     */
    public function handleDataDisplay(&$data)
    {
        if ($data) {
            $data->each(function ($item, $key) {
                $item->editRoute = route($this->routeConf['editPage'], $item->id);
                $item->delRoute = route($this->routeConf['del'], $item->id);
                $item->comment_type = Comment::$commentType[$item->comment_type];
                $item->target = optional(Article::find($item->target))->title ?? '网站留言';
                $item->allowEdit = false;
                $item->allowDel = true;
            });
        }
    }

    /**
     * @param null $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function editor($id = null)
    {
        request()->session()->flash('msg', '后台不支持新增评论');
        return back();
    }

    /**
     * @param $id
     * @return array
     */
    public function delComment($id)
    {
        return parent::del($id, route($this->routeConf['list']));
    }
}
