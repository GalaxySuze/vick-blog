<?php

namespace App\Http\Controllers\Backstage;

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
                $item->allowEdit = false;
                $item->allowDel = true;
            });
        }
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
